<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class WebsiteMakeController extends Controller
{
    public function storeWebsite(Request $request){
        // dd($request->all());
        try {
            $check = Website::where('id_event',$request->id_event)->first();
            if(!$check){
                if ($request->image != null) {
                    $image = $request->file('image');
                    $filename = time() . '.' . $image->extension();
                    $image->move(public_path('website-banner/'), $filename);
                }
                $website = Website::create([
                    'id_event' => $request->id_event,
                    'image' => $filename?$filename:null,
                ]);
            }else{
                if(file_exists('website-banner/'.$check->image)){
                    $delete = unlink('website-banner/'.$check->image);
                }
                if ($request->image != null) {
                    $image = $request->file('image');
                    $filename = time() . '.' . $image->extension();
                    $image->move(public_path('website-banner/'), $filename);
                }
                $website = Website::where('id_event', $request->id_event)->update([
                    'image' => $filename?$filename:null,
                ]);
            }
            $data = Website::where('id_event', $request->id_event)->first();
            return response()->json(['status'=>true, 'website'=> $data]);    
        } catch (\Exception $e) {
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
    public function getWebsite(Request $request){
        dd('here');
        try {
            $website = Website::where('id_event', $request->id_event)->first();
            return response()->json(['status'=>true, 'website'=>$website]);    
        } catch (\Exception $e) {
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
