<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\RegisterSent;
use App\Mail\RecoverSent;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Auth;


class WebsiteController extends Controller
{
    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $event=\App\Event::where('id_event',$request->route('idevent'))->first();
        $photogallery=\App\Photogallery::where('id_event',$request->route('idevent'))->get();
        //return $event; 
        $eventType = DB::table('event_type')->where(['id_eventtype' => $event->type_id])->first();

        

		if($event) return view('website')->with('event', $event)->with('photogallery', $photogallery)->with('eventType', $eventType);
		else return redirect('/');
    }

    public function apiWeb(Request $req){
        
    }

    public function saveWebComponent(Request $request){
        //return $request;

        DB::table('webpage')->insert([
            'nav_name' => $request->input('nav_name'),
            'user_id' => Auth::id(),
            'event_id' => $request->input('event_id'),
            'element_name' => $request->input('element_name'),
            'html_doc' => $request->input('html_doc'),
        ]);

        return "Done";
    }

    public function getWebComponent(Request $request){
        //return $request;

        return DB::table('webpage')
        ->where([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
        ])
        ->orderBy('id', 'asc') // Change 'asc' to 'desc' for descending order
        ->get();

        
    }


    public function deleteWebComponent(Request $request){
        //return $request;

        return DB::table('webpage')
        ->where([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'element_name' => $request->componentID
        ])
        ->delete();

        
    }

    public function updateWebComponent(Request $request){
        
        return DB::table('webpage')
        ->where(['user_id' =>  Auth::id(), 'event_id' => $request->event_id, 'element_name' => $request->element_name]) // Replace $yourWebpageId with the actual ID of the record you want to update
        ->update([
        'nav_name' => $request->input('nav_name'),
        'element_name' => $request->input('element_name'),
        'html_doc' => $request->input('html_doc'),
    ]);

        return "Done";
    }


    public function uploadImages(Request $request)
    {
        return $request;
        // $file = $request->file('file');
        // $fileContent = file_get_contents($file->getRealPath());
        // dd($fileContent);
        // DB::table('webpage')
        // ->where(['user_id' =>  Auth::id(), 'event_id' => $request->event_id, 'element_name' => $request->element_name]) // Replace $yourWebpageId with the actual ID of the record you want to update
        // ->update([
        // 'pic1' => $fileContent,
        // ]);

        // // Move the file to public/webImages
        // $file->move(public_path('webImages'), $file->getClientOriginalName());

        // return response()->json(['message' => 'File uploaded successfully']);
    }

    // public function uploadImages2(Request $request)
    // {
    //     //return $request;
    //     $file = $request->file('file');
    //     $fileContent = file_get_contents($file->getRealPath());

    //     DB::table('webpage')
    //     ->where(['user_id' =>  Auth::id(), 'event_id' => $request->event_id, 'element_name' => $request->element_name]) // Replace $yourWebpageId with the actual ID of the record you want to update
    //     ->update([
    //     'pic1' => $fileContent,
    //     'pic2' => $fileContent,
    //     ]);

    //     // Move the file to public/webImages
    //     $file->move(public_path('webImages'), $file->getClientOriginalName());

    //     return response()->json(['message' => 'File uploaded successfully']);
    // }

    public function showGallery(Request $request)
    {
        $event=\App\Event::where('id_event',$request->route('id'))->first();
        $photogallery=\App\Photogallery::where('id_event',$request->route('id'))->get();
        $eventType = DB::table('event_type')->where(['id_eventtype' => $event->type_id])->first();
        return view('showGallery')->with('event', $event)->with('photogallery', $photogallery)->with('eventType', $eventType);
    }
}