<?php

namespace App\Http\Controllers;

use App\Banner;
use App\FeatureCategory;
use App\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use File;

class HomePagesController extends Controller
{
    public function index(Request $request){
        return view('home-pages.index')->with([
            'categories' => ProductCategory::whereNull('parent_id')->notDelete()->active()->get(),
            'featureCategories' => FeatureCategory::get(),
            'bannerImages' => Banner::get(),
        ]);
    }

    public function updateHomePage(){

        $featureCategories = FeatureCategory::get();

        if(count($featureCategories) > 0){
            foreach(\request()->feature_category_id as $i => $id) {
                $newFeatureCategories = FeatureCategory::findOrFail($id);
                $image = $newFeatureCategories->image;
                $dataImage = isset(request()->category_image[$i]);
                
                if($dataImage){
                    $dataImage = uploadCategoryImage(\request()->category_image[$i]);

                    if(File::exists($image))
                    {
                        File::delete($image);
                    }
                }else{
                    $dataImage = $newFeatureCategories->image;
                }

                $newFeatureCategories->update([
                    'category_id' => \request()->category_id[$i],
                    'image' => $dataImage,
                ]);
            }
        }else{
            foreach(\request()->category_id as $i => $categoryId){
                $image = "";
                if(isset(\request()->category_image[$i])){
                    $image = uploadCategoryImage(\request()->category_image[$i]);
                }
                FeatureCategory::Create([
                    'category_id' => $categoryId,
                    'image' =>  $image,
                ]);
            }
        }

        $banner = Banner::get();

        if(count($banner) > 0){

            $dataBannerImage = \request()->banner_image;
            $banner = Banner::findOrFail(\request()->banner_id);

            $image = $banner->image;

            if (\request()->banner_image) {
                $dataBannerImage = uploadBannerImage(\request()->banner_image);

                if(File::exists($image))
                {
                    File::delete($image);
                }
            }else{
                $dataBannerImage = $banner->image;
            }

            $banner->update([
                'image' => $dataBannerImage,
            ]);

        }else{
            if(\request()->banner_image){
                Banner::Create([
                    'image' =>  uploadBannerImage(\request()->banner_image),
                ]);
            }
        }
       
        toast('success','Feature category and banner has been updated.');
        return redirect()->back();
    }

    public function create(){}
    public function store(Request $request){ }
    public function edit($id){}
    public function update(Request $request ,$id){}
    public function show($id){}
    public function destroy($id){}
}
