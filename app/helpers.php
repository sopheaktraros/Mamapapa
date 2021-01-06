<?php

use App\CustomerTransactionBalance;
use App\AuditorTransactionBalance;
use App\Delivery;
use App\Setting;
use App\HelpCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @param null $name
 *
 * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed|null
 */
function setting($name = null)
{
    $settings = Setting::get();

    if (!$name) {
        return $settings;
    }
    $setting = array_filter($settings->toArray(), function ($setting) use ($name) {
        return $setting['setting_name'] == $name;
    });
    
    if (!$setting) {
        return null;
    }

    return array_shift($setting)['setting_value'];
}

function helpCenter($name = null)
{
	$helpCenters = HelpCenter::get();

    if (!$name) {
        return $helpCenters;
    }

    $helpCenter = array_filter($helpCenters->toArray(), function ($helpCenter) use ($name) {
        return $helpCenter['help_center_name'] == $name;
    });

    if (!$helpCenter) {
        return null;
    }

    return array_shift($helpCenter)['help_center_value'];
}


function autoTrucking()
{
    $autoTrucking = rand(100000, 999999) . rand(1000000, 9999999);
    $delivery = Delivery::where('trucking_number', $autoTrucking)->first();
    if ($delivery) {
        return autoTrucking();
    }

    return $autoTrucking;
}

function autoTransactionCode()
{
    $transaction = CustomerTransactionBalance::orderby('id','desc')->first();
    $count = $transaction ? $transaction->id + 1 : 1;
    return 'DRSB'.sprintf('%09d',$count);
}

function auditorTransactionCode()
{
    $transaction = AuditorTransactionBalance::orderby('id','desc')->first();
    $count = $transaction ? $transaction->id + 1 : 1;
    return 'DRSB'.sprintf('%09d',$count);
}

function parseUrl($url): array
{
    $result = [
        'type' => null,
        'id' => null,
        'error' => null
    ];

    if (empty($url)) {
        $result['error'] = 'url is empty!';
        return $result;
    }

    $url = str_replace('&amp;','&',$url);

    $id = '';
    if (strpos($url,'taobao.')!==false || strpos($url,'tmall.')!==false)
    {
        if (strpos($url, 'a.m.taobao.com')!==false) {
            $taobao_url=explode('com/i',$url);
            [$id] = explode('.htm?', $taobao_url[1]);
        } elseif(strpos($url,'guide/detail.html')!==false) {
            preg_match('@id=1_[\d]{7}([\d]+)@is',$url,$match);
            if($match[1]) {
                $id = $match[1];
            }
        }else{
            if(strpos($url,'world.taobao.com')!==false){
                [$url] = explode('?', $url);
            }

            if(strpos($url,'id=')){
                $arr = parse_url($url);
                if($arr['query']){
                    $queryParts = explode('&', $arr['query']);
                    foreach ($queryParts as $param) {
                        $item = explode('=', $param);
                        if($item[0]==='id') {
                            $id = $item[1];
                        }
                    }
                }else{
                    $q ='';
                    preg_match('@id=(\d+)(&)?$@isU',$q,$match);
                    $id = $match[1];
                }

            }elseif(preg_match('@item/(\d+).htm@',$url,$m)){
                $id = $m[1];
            }
        }
        $result['id'] = $id;
        $result['type'] = 'taobao';
    } elseif (strpos($url,'1688')!==false) {
        preg_match('@1688.com/page/index.htm\?offerId=(\d+)@is',$url,$match);
        if ($match) {
            $result['id']=$match[1];
        }
        if(!$result['id']){
            preg_match('@offer/(\d+).html@isU',$url,$match);
            $result['id']=$match[1];
        }
        $result['type'] = '1688';
    }
    return $result;
}

function itemGetFromChineseAPI($url)
{

    $webUrl = $url;
    $data = parseUrl($webUrl);

    $params = http_build_query([
        'key' => 'sambathexpress.com',
        'secret' => '20191017',
        'secache_time' => '86400',
        'api_name' => 'item_get',
        'num_iid' => $data['id'],
        'lang' => 'cn' //en
    ]);

    $url = 'http://api.onebound.cn/'.$data['type'].'/api_call.php?'.$params;

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Sambathexpress'
    ));
    $res = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Time out';
        return redirect()->back();
    }
    curl_close($curl);

    $result = '';
    $skus = [];
    $skuQty = [];
    $skusJson = [];
    $propImgs = [];
    $props = [];
    if ($res) {
        $result = json_decode($res, true);

        if (
            (isset($result['item']['error']) === 'off-sale') ||
            (isset($result['item']['error']) === 'error mtop') ||
            (isset($result['item']['error']) === 'error') ||
            (isset($result['item']['error']) === 'item-not-found')
        ) {
            $result = '';
        }

        //Get Sku
        if(isset($result['item']['skus']))
        {
            $sku = $result['item']['skus'];
            if($sku['sku']){
                foreach($sku['sku'] as $sku) {
                    $skusJson[] = array(
                        $sku['sku_id'],
                        $sku['properties'],
                        $sku['price'],
                        (int)$sku['quantity']
                    );

                    if(strpos($sku['properties'], ';') !== false) {
                        $properties = explode(';',$sku['properties']);
                        $skus[$properties[1]] = $sku['price'];
                        $skuQty[$properties[1]] = $sku['quantity'];
                    } else {
                        $skus[$sku['properties']] = $sku['price'];
                        $skuQty[$sku['properties']] = $sku['quantity'];
                    }
                }
            }
        }

        //Get props list
        if(isset($result['item']['prop_imgs'])) {
            $propImg = $result['item']['prop_imgs'];
            if($propImg['prop_img'])
            {
                foreach($propImg['prop_img'] as $propImg)
                {
                    $propImgs[$propImg['properties']] = $propImg['url'];
                }
            }
        }

        if (isset($result['item']['props_list'])) {
            foreach($result['item']['props_list'] as $dk => $val){
                $dks = explode(':',$dk);
                $vals = explode(':',$val);
                $propImg = !empty($propImgs[$dks[0].':'.$dks[1]]) ? $propImgs[$dks[0].':'.$dks[1]] :'';
                $price = !empty($skus[$dks[0].':'.$dks[1]]) ? $skus[$dks[0].':'.$dks[1]] :'';

                $props[$dks[0]][$dks[1]] = [
                    'prop_key'=> $dks[0],
                    'prop_val'=> $dks[1],
                    'name'=> $vals[0],
                    'value'=> $vals[1],
                    'price'=> $price,
                    'pic_url'=> $propImg
                ];

            }
        }
    }

    return [
        'items' => $result,
        'apiType' => $data['type'],
        'skusJson' => json_encode($skusJson),
        'propImgs' => $propImgs,
        'props' => $props
    ];

}

function uploadImageBase64($requestFile, $path = 'images/') {
	$img = Image::make($requestFile)->encode('png');
    $imgPath = $path . uniqid() . '.png';
    $img->save($imgPath);

    return $imgPath;
}

/**
 * @param $requestFile
 * @param string $path
 *
 * @return string
 */
function uploadImage($requestFile, $path = 'images/')
{
    $format = $requestFile->getClientOriginalExtension();
    $img = Image::make($requestFile)->encode($format, 50);
    $imgPath = $path . uniqid() . '.'.$format;
    $img->save($imgPath, 50);

    return $imgPath;
}

function uploadImageCustom($requestFile, $path)
{
    $format = $requestFile->getClientOriginalExtension();
    $img = Image::make($requestFile)->encode($format, 50);
    $imgPath = $path . uniqid() . '.'.$format;
    $img->save($imgPath, 50);

    return $imgPath;
}

function uploadIcon($requestFile, $path = 'images/website/icon/')
{
    $format = $requestFile->getClientOriginalExtension();
    $icon = Image::make($requestFile)->encode($format, 50);
    $iconPath = $path . uniqid() . '.'.$format;
    $icon->save($iconPath, 50);
	return $iconPath;
}

function uploadPropImage($requestFile, $path = 'images/website/criterias/')
{
    $format = $requestFile->getClientOriginalExtension();
    $propImage = Image::make($requestFile)->encode($format, 50);
    $propImagePath = $path . uniqid() . '.'.$format;
    $propImage->save($propImagePath, 50);
	return $propImagePath;
}

function uploadThumbnail($requestFile, $path = 'images/website/product/')
{
    $format = $requestFile->getClientOriginalExtension();
    $thumbnail = Image::make($requestFile)->encode($format, 50);
    $thumbnailPath = $path . uniqid() . '.'.$format;
    $thumbnail->save($thumbnailPath, 50);
	return $thumbnailPath;
}

function uploadCategoryImage($requestFile, $path = 'images/website/category/')
{
    $format = $requestFile->getClientOriginalExtension();
    $img = Image::make($requestFile)->encode($format, 50);
    $imgPath = $path . uniqid() . '.'.$format;
    $img->save($imgPath, 50);

    return $imgPath;
}

function uploadBannerImage($requestFile, $path = 'images/website/banner/')
{
    $format = $requestFile->getClientOriginalExtension();
    $img = Image::make($requestFile)->encode($format, 50);
    $imgPath = $path . uniqid() . '.'.$format;
    $img->save($imgPath, 50);

    return $imgPath;
}

/**
 * @param $requestFile
 * @param string $path
 * @param $resizeWidth
 *
 * @return string
 */
function uploadResize($requestFile, $path = 'images/', $resizeWidth)
{
    $img = Image::make($requestFile)->fit($resizeWidth);
    $imgPath = public_path($path) . uniqid() . '.png';
    $img->save($imgPath);
    return $imgPath;
}

/**
 * @param $errors
 *
 * @return string
 */
function showError($errors)
{
    return '<p class="text-danger text-right m-0">' . $errors . '</p>';
}

/**
 * @return bool
 */
function isSuperAdmin() {
	if ( ! Auth::check()) {
		return false;
	}

	return Auth::user()->id == 1;
}

/**
 * @return bool
 */
function isSystemAdmin() {
	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	return $role->userGroup->id == 2;
}

/**
 * @return bool
 */
function isBranchAdmin() {
	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	return $role->userGroup->id == 3;
}

/**
 * @return bool
 */
function isSystemUser() {
	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	return $role->userGroup->id == 4;
}

/**
 * @return bool
 */
function isTeacher() {
	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	return $role->userGroup->id == 5;
}

/**
 * @return bool
 */
function isStudent() {
	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	return $role->userGroup->id == 6;
}

/**
 * @return bool
 */
function isGuest() {
	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	return $role->userGroup->id == 7;
}

/**
 * @param $groupName
 *
 * @return bool
 */
function atLeastGroup($groupName) {
	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	if ( ! Cache::get('user.groups')) {
		return false;
	}

	$group = array_filter(Cache::get('user.groups')->toArray(), function ($group) use ($groupName) {
		return $group['name'] == $groupName;
	});

	if ( ! $group) {
		return false;
	}

	$groupId = array_values($group)[0]['id'];

	return $role->userGroup->id <= $groupId;
}

/**
 * @param $permission
 * @param string $type
 *
 * @return bool
 */
function hasPermission($permission, $type = 'read')
{
	if(! Auth::check()) {
		return false;
	}

	$role = session('auth.role');
	if ( ! $role) {
		return false;
	}

	$permission = array_filter($role->permission->toArray(), function ($userPermission) use ($permission, $type) {
		return $userPermission['name'] == $permission && $userPermission['pivot'][$type] == 1;
	});

	if ( ! $permission && ! isSuperAdmin()) {
		return false;
	}

	return count($permission) > 0 || isSuperAdmin();
}

/**
 * @param $file
 * @param string $path
 *
 * @return string
 */
function storageUpload($file, $path = 'files')
{
    $file_extension = $file->getClientOriginalExtension();
    $full_name = uniqid() . '.' . $file_extension;
    $full_path = $path .'/'. $full_name;

    Storage::disk('public')->put($full_path, file_get_contents($file));

    return 'uploads/' . $full_path;
}


/**
 * @return string|null
 */
function role() {
    if(! Auth::check()){
        return null;
    }

	$user = \App\User::with('role')->find(Auth::user()->id);
	return strtolower($user->role->name);
}

/**
 * @param $type
 * @param $message
 *
 * @return bool
 */
function toast($type, $message) {
	request()->session()->flash('toast', true);
	request()->session()->flash($type, $message);

	return true;
}

function active_language() {
    return session('active_language') ?? 'en';
}

function phone($data){
    $phoneFormat = rtrim($data,"_");
    if (strlen($phoneFormat)==0){
        $phone = '';
    }
    elseif (strlen($phoneFormat)==11){
        $phone = $phoneFormat;
    }
    elseif (strlen($phoneFormat)<11){
        $phone = '';
    }
    else{
        $phone = $data;
    }
    return $phone;
}

function read_more($content,$limit){

    if (strlen($content) >$limit){
        $readLess = substr($content,0,100);
        $readMore = substr($content,strlen($readLess),strlen($content));

        return $readLess.'<span class="dot-show">...</span>'.
            '<span class="read-more-show" id="read-more">Read More</span>'.
            '<span class="read-more-content">'
                . $readMore. '<span class="read-less-show" id="read-less">Read Less</span> 
            </span>';
    }
    return $content;
}

/**
 ** The generate username
 * @param $users
 * @return string
 */
function generateUser($users){
    $generate = '';
    /*Check type of provider*/
    $count = $users +1;

    /*generate user with provider of user*/
    if ($count<10){
        $generate = $generate. '00000'. $count;
    }elseif ($count<100){
        $generate = $generate. '0000'.$count;
    }
    elseif ($count<1000){
        $generate = $generate. '000'.$count;
    }elseif ($count<10000){
        $generate = $generate. '00'.$count;
    }elseif ($count<100000){
        $generate = $generate. '0'.$count;
    }else{
        $generate = $generate. $count;
    }
    return $generate;
}

function deliveryStatus($value){
    $arrStatus = [
        'Pending',
        'Paid',
        'Complete',
        'Return',
        'Shipping',
    ];
    return $arrStatus[$value];
}