<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function websiteSetting(){
        // $setting = Setting::all();
        $setting = DB::table('settings')->first();
        return view('admin.setting.setting',compact('setting'));
    }

    public function updateSetting(Request $request,$id){
        $validateData = ([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
            'company_mobile' => $request->company_mobile,
            'company_city' => $request->company_city,
            'company_country' => $request->company_country,
            'company_phone' => $request->company_phone,
        ]);

        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_email'] = $request->company_email;
        $data['company_address'] = $request->company_address;
        $data['company_mobile'] = $request->company_mobile;
        $data['company_city'] = $request->company_city;
        $data['company_country'] = $request->company_country;
        $data['company_phone'] = $request->company_phone;
        $data['company_zipcode'] = $request->company_zipcode;

        $image = $request->company_logo;

        if($image){
            $image_name = $request->email;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/company/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['company_logo'] = $image_url;
                $img = DB::table('settings')->where('id',$id)->first();
                $image_path = $img->company_logo;
                $done = unlink($image_path);
                $post = DB::table('settings')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->back()->with($notification);
                    }else{
                        $notification = array('message' => 'Error while Updating','alert-type' => 'danger');
                        return redirect()->back()->with($notification);
                    }
            }else{
                return redirect()->back();
            }
        }else{
            $oldPhoto = $request->old_photo;
            if($oldPhoto){
                $data['company_logo'] = $oldPhoto;
                $post = DB::table('settings')->where('id',$id)->update($data);
                    if($post){
                        $notification = array('message' => 'Successfully Updated','alert-type' => 'success');
                        return redirect()->back()->with($notification);
                    }else{
                        $notification = array('error' => 'Error while Updating','alert-type' => 'error');
                        return redirect()->back()->with($notification);
                    }
            }
        }
    }
}
