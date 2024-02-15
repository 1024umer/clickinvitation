<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Mail\InvitationSent;
use App\Mail\AcknowledgmentSent;
use App\Mail\MessagingSent;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class OperationController extends Controller
{

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function attending(Request $request)
    {
        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();
        if($guest){
            $event=\App\Event::where('id_event',$guest->id_event)->first();
            //$group=\App\Guest::where('id_event',$guest->id_event)->where('mainguest',1)->first();
            $group=$guest;
            $added=\App\Guest::where('parent_id_guest',$guest->id_guest)->count();

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);

            $isCorporate = DB::table('event_type')->where(['id_eventtype' => $event->type_id])->first()->corporate_event;
            if($event){
                return view('operations.attending', ['cardId'=> $request->route("cardId"), 'guestCode'=> $request->route("guestcode"), 'isCorporate'=>$isCorporate])->with('guest',$guest)->with('event',$event)->with('group',$group)->with('added',$added);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }



    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request)
    {

        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();

        
        if($guest){

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);

            $event=\App\Event::where('id_event',$guest->id_event)->first();
            if($event){
                $guests=\App\Guest::where('parent_id_guest',$guest->id_guest)->get();
                return view('operations.checkin')->with('guest',$guest)->with('guests',$guests)->with('event',$event);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function addphotos(Request $request)
    {

        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();
        if($guest){

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);

            $event=\App\Event::where('id_event',$guest->id_event)->first();
            if($event){
                return view('operations.addphotos')->with('guest',$guest)->with('event',$event)->with('ack',0);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function addphotosack(Request $request)
    {

        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();
        if($guest){
            
            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);

            $event=\App\Event::where('id_event',$guest->id_event)->first();
            if($event){
                return view('operations.addphotos')->with('guest',$guest)->with('event',$event)->with('ack',1);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function sorrycant(Request $request)
    {

        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();
        if($guest){

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);


            $event=\App\Event::where('id_event',$guest->id_event)->first();
            if($event){
                return view('operations.sorrycant')->with('guest',$guest)->with('event',$event);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function giftsuggestion(Request $request)
    {

        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();
        if($guest){

            $lang = $request->route("lang");

            if (array_key_exists($lang, Config::get('languages'))) {
                Session::put('applocale', $lang);
            }
            App::setLocale($lang);

            
            $event=\App\Event::where('id_event',$guest->id_event)->first();
            if($event){
                $gifts=\App\Gift::where('id_event',$event->id_event)->get();

                return view('operations.giftsuggestion')->with('gifts',$gifts)->with('event',$event)->with('guest',$guest);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }





    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function testinvitation(Request $request)
    {
        $guest=\App\Guest::where('id_guest',Auth::User()->email)->first();
        if($guest && $guest->id_event==$request->route('idevent')){
            $event=\App\Event::where('id_event',$request->route('idevent'))->first();
            if($event) return view('mails.invitation')->with('event',$event)->with('guest',$guest)->with('fake',0);
            else return redirect('/');
        }
        
        Mail::to(Auth::User()->email)->send(new InvitationSent());
        return 'ok';
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function testacknowledgment(Request $request)
    {

        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();
        if($guest){
            $event=\App\Event::where('id_event',$guest->id_event)->first();
            if($event){
                $gifts=\App\Gift::where('id_event',$event->id_event)->get();

                return view('operations.giftsuggestion')->with('gifts',$gifts)->with('event',$event)->with('guest',$guest);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function testmessaging(Request $request)
    {

        $guest=\App\Guest::where('code',$request->route('guestcode'))->first();
        if($guest){
            $event=\App\Event::where('id_event',$guest->id_event)->first();
            if($event){
                $gifts=\App\Gift::where('id_event',$event->id_event)->get();

                return view('operations.giftsuggestion')->with('gifts',$gifts)->with('event',$event)->with('guest',$guest);
            }
            else return redirect('/');
        }
        else return redirect('/');
    }
}