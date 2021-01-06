<?php

namespace App\Http\Controllers;
use App\AboutUs;
use App\OurService;
use App\Partnership;
use File;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('about-us.index')->with([
            'aboutUs' => AboutUs::get(),
            'ourServices' => OurService::notDelete()->get(),
            'partnerShips' => Partnership::notDelete()->get(),
        ]);
    }

    public function updateAboutUs(){

        // dd(\request()->all());

        $this->validate(\request(),[
            'who_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'why_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'who_description_en' => 'required',
            'why_description_en' => 'required',
            ],[
            'who_description_en.required'=> 'The description english field is require',
            'why_description_en.required'=> 'The description english field is require',
        ]);
    
        $about = AboutUs::findOrFail(\request()->about_us_id);

        $data = \request()->all();

        $whoImage = $about->who_image; 
        if(\request()->who_image){
            $data['who_image'] = uploadImageCustom(\request()->who_image, 'images/website/about-us/');

            if(File::exists($whoImage))
            {
                File::delete($whoImage);
            }
        }

        $whyImage = $about->why_image; 
        if(\request()->why_image){
            $data['why_image'] = uploadImageCustom(\request()->why_image, 'images/website/about-us/');

            if(File::exists($whyImage))
            {
                File::delete($whyImage);
            }
        }

        $about->update($data);

        foreach (\request()->our_service_id as $i => $serviceId) {
            $ourService = OurService::firstOrNew(['id' => $serviceId]);

            $serviceIcon = $ourService->icon;
            $dataServiceIcon = isset(\request()->service_icon[$i]);
            if($dataServiceIcon){
                $dataServiceIcon = uploadImageCustom(\request()->service_icon[$i], 'images/website/about-us/');
    
                if(File::exists($serviceIcon))
                {
                    File::delete($serviceIcon);
                }
            }else{
                $dataServiceIcon = $ourService->icon; 
            }

            $ourService->name_en = \request()->service_name_en[$i];
            $ourService->name_kh = \request()->service_name_kh[$i];
            $ourService->description_en = \request()->service_des_en[$i];
            $ourService->description_kh = \request()->service_des_kh[$i];
            $ourService->icon = $dataServiceIcon ? $dataServiceIcon : '';
            $ourService->delete = \request()->delete[$i];
            $ourService->save();
        }

        foreach (\request()->partner_id as $i => $partnerId) {
            $partnerShip = PartnerShip::firstOrNew(['id' => $partnerId]);

            $partnerLogo = $partnerShip->logo;
            $dataPartnerLogo = isset(\request()->partner_logo[$i]);
            if($dataPartnerLogo){
                $dataPartnerLogo = uploadImageCustom(\request()->partner_logo[$i], 'images/website/about-us/');
    
                if(File::exists($partnerLogo))
                {
                    File::delete($partnerLogo);
                }
            }else{
                $dataPartnerLogo = $partnerShip->logo; 
            }

            $partnerShip->name_en = \request()->partner_name_en[$i];
            $partnerShip->name_kh = \request()->partner_name_kh[$i];
            $partnerShip->link = \request()->partner_link[$i];
            $partnerShip->logo = $dataPartnerLogo;
            $partnerShip->delete = \request()->partner_delete[$i];
            $partnerShip->save();
        }

       toast('success','About us has been updated.');
       return redirect()->back();
    }

    public function create(){}
    public function store(Request $request){}
    public function edit($id){}
    public function update(Request $request, $id){}
    public function show($id){}
    public function destroy($id){ }
}
