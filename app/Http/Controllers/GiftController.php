<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;


class GiftController extends Controller
{
    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function newgift(Request $request)
    {

		$gift=new \App\Gift;
		$gift->name=$request->namegift;
		$gift->description=$request->descriptiongift;
        $gift->link=$request->linkgift;
		$gift->id_event=$request->idevent;

		$gift->save();
		return 1;
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function showgifts(Request $request)
    {

		$gifts=\App\Gift::where('id_event', $request->idevent)->get();
        foreach($gifts as $gift){
            if($gift->id_pick){
                $gift->pick=\App\Guest::where('id_guest',$gift->id_pick)->first();
            }
        }
		return $gifts;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function showopgifts(Request $request)
    {

        $gifts=\App\Gift::where('id_event', $request->idevent)->get();
        foreach($gifts as $gift){
            if($gift->id_pick){
                $gift->pick=\App\Guest::where('id_guest',$gift->id_pick)->first();
            }
        }
        return $gifts;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delgift(Request $request)
    {

		$gift=\App\Gift::where('id_gift',$request->idgift)->first();
        if($gift){
            $event=\App\Event::where('id_event',$gift->id_event)->first();
            if($event && $event->id_user==Auth::id()) $gift->delete();
                else return 0;
        }
        else return 0;
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function editgift(Request $request)
    {

        $gift=\App\Gift::where('id_gift',$request->idgift)->first();
        if($gift){
            $gift->name=$request->giftname;
            $gift->description=$request->giftdescription;
            $gift->link=$request->giftlink;
 
            $gift->save();
            return 1;
        }
        else return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function pickgift(Request $request)
    {

        $gift=\App\Gift::where('id_gift',$request->idpick)->first();
        if($gift){
            $gift->id_pick=$request->idguest;
            $gift->save();
            return 1;
        }
        else return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function savetransfer(Request $request)
    {

        $event=\App\Event::where('id_event',$request->idevent)->first();
        if($event){
            $event->transfer_type=$request->transfertype;
            $event->transfer_link=$request->transferlink;

            $event->save();
            return 1;
        }
        else return 0;
    }
}