<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileNameWithExtension = $request->file('banner_image')->getClientOriginalName(); // name
        $fileNameWithoutExtension = pathinfo($fileNameWithExtension , PATHINFO_FILENAME); // just name
        function clean($string) {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
            return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }
        $filename = clean($fileNameWithoutExtension);
        $fileExtensionWithoutName = $request->file('banner_image')->getClientOriginalExtension(); // just extension
        $file = 'banner-'.$filename.'.'.$fileExtensionWithoutName;
        $request->file('banner_image')->storeAs('banner',$file,'public');
        Banner::create(['title'=>$request->banner_title,'description'=>$request->banner_description,'image'=>$file]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        $banners = Banner::orderBy('id','desc')->get();
        $data_banner = "";
        $data_indicator = "";
        $i = 0;
        foreach ($banners as $banner) {
            if ($i == 0) {
                $data_banner .= '
                <div class="carousel-item active">
                    <img style="height: 400px;" src="../storage/app/public/banner/'.$banner->image.'" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>'.$banner->title.'</h5>
                        <p>'.$banner->description.'</p>
                        <button onclick="edit_banner('.$banner->id.')" class="btn btn-primary btn-icon btn-hover btn-sm btn-rounded">
                            <i class="anticon anticon-edit"></i>
                        </button>
                        <button onclick="delete_banner('.$banner->id.')" class="btn btn-danger btn-icon btn-hover btn-sm btn-rounded">
                            <i class="anticon anticon-delete"></i>
                        </button>
                    </div>
                </div>
                ';
            }
            else {
                $data_banner .= '
                <div class="carousel-item">
                    <img style="height: 400px;" src="../storage/app/public/banner/'.$banner->image.'" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>'.$banner->title.'</h5>
                        <p>'.$banner->description.'</p>
                        <button onclick="edit_banner('.$banner->id.')" class="btn btn-primary btn-icon btn-hover btn-sm btn-rounded">
                            <i class="anticon anticon-edit"></i>
                        </button>
                        <button onclick="delete_banner('.$banner->id.')" class="btn btn-danger btn-icon btn-hover btn-sm btn-rounded">
                            <i class="anticon anticon-delete"></i>
                        </button>
                    </div>
                </div>
                ';
            }
            if ($i == 0) {
                $data_indicator .= '
                    <li data-target="#carouselExampleCaptions" data-slide-to="'.$i.'" class="active"></li>
                ';
            }
            else {
                $data_indicator .= '
                    <li data-target="#carouselExampleCaptions" data-slide-to="'.$i.'"></li>
                ';
            }
           $i++; 
        }
        $object = new Banner();
        $object->banner = $data_banner;
        $object->indicator = $data_indicator;
        return json_encode($object);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $banner = Banner::where('id','=',$request->banner_id)->first();
        return json_encode($banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->hasFile('banner_image')) {
            $bnr = Banner::where('id','=',$request->banner_id)->first();
            Storage::delete('/public/banner/'.$bnr->image);
            $fileNameWithExtension = $request->file('banner_image')->getClientOriginalName(); // name
            $fileNameWithoutExtension = pathinfo($fileNameWithExtension , PATHINFO_FILENAME); // just name
            function clean($string) {
                $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
                return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
            }
            $filename = clean($fileNameWithoutExtension);
            $fileExtensionWithoutName = $request->file('banner_image')->getClientOriginalExtension(); // just extension
            $file = 'banner'.$request->banner_id.'-'.$filename.'.'.$fileExtensionWithoutName;
            $request->file('banner_image')->storeAs('banner',$file,'public');
            Banner::where('id',$request->banner_id)->update(['image'=>$file]);
        }
        Banner::where('id',$request->banner_id)->update(['title'=>$request->banner_title,'description'=>$request->banner_description]);
        return "Successfully Updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $banner = Banner::where('id','=',$request->banner_id)->first();
        Storage::delete('/public/banner/'.$banner->image);
        Banner::where('id',$request->banner_id)->delete();
        return "Succesfully deleted";
    }
}
