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


class AdminController extends Controller
{

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function allprofiles(Request $request)
    {

		if($request->has('iduser')){

			$user = \App\User::where('id', '=', $request->iduser)->first();
			if($user->admin==1){
				$result=\App\User::get();
				return $result; 
			}
			else return '';
		}
		else return '';
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function myprices(Request $request)
    {

		$data=\App\Data::where('id_data',1)->first();

		return'[{"canadasubtotal1":"'.$data->subcan1.'", "canadasubtotal2":"'.$data->subcan2.'", "usasubtotal1":"'.$data->subusa1.'", "usasubtotal2":"'.$data->subusa2.'", "canadatps1":"'.$data->tpscan1.'", "canadatps2":"'.$data->tpscan2.'", "usatps1":"'.$data->tpsusa1.'", "usatps2":"'.$data->tpsusa2.'", "canadatvq1":"'.$data->tvqcan1.'", "canadatvq2":"'.$data->tvqcan2.'", "usatvq1":"'.$data->tvqusa1.'", "usatvq2":"'.$data->tvqusa2.'"}]';
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function saveprices(Request $request)
    {

		$data=\App\Data::where('id_data',1)->first();
		$data->subcan1=$request->canadasubtotal1;
		$data->subcan2=$request->canadasubtotal2;
		$data->subusa1=$request->usasubtotal1;
		$data->subusa2=$request->usasubtotal2;
		$data->tpscan1=$request->canadatps1;
		$data->tpscan2=$request->canadatps2;
		$data->tpsusa1=$request->usatps1;
		$data->tpsusa2=$request->usatps2;
		$data->tvqcan1=$request->canadatvq1;
		$data->tvqcan2=$request->canadatvq2;
		$data->tvqusa1=$request->usatvq1;
		$data->tvqusa2=$request->usatvq2;
		$data->save();
		return 'ok';
	
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function newcode(Request $request)
    {

		$code= new \App\Code;
		if($request->has('code')) $code->code=$request->code;
		if($request->has('discount')) $code->discount=$request->discount;
		if($request->has('type')) $code->type=$request->type;
		if($request->has('expiredate')) $code->expiredate=$request->expiredate;

		$code->save();
		return 'ok';
	
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function mycodes(Request $request)
    {

		$codes= \App\Code::get();
		return $codes;
	
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delcode(Request $request)
    {

		$code= \App\Code::where('id_code', $request->codeid)->first();
		if($code) $code->delete();
		return 'ok';
	
    }    






























    

    /*---------------------------
    --  REGISTER  --
    ---------------------------*/
    public function register(Request $request)
    {

		$result1=\App\User::where('email',$request->emailreg)->first();

		if($result1!=null) return 2;
		else{

			$ip='';

			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
			}

			$user= new \App\User;

			$user->name=$request->firstnamereg;
			$user->surname=$request->surnamereg;
			$user->email=$request->emailreg;
			$user->phone=$request->phonereg;
			$user->role=1;
			$user->confirmation_code= substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
			$user->language='';
			$user->active=0;
			$user->password=password_hash($request->passwordreg,PASSWORD_DEFAULT);
			$user->ip=$ip;


			$user->save();

			Mail::to($user->email)->send(new RegisterSent($user->confirmation_code));

			return 1;
		}
	}



    /**
     * Conferma e-mail.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {

		$user=\App\User::where('confirmation_code', $request->route('code'))->first();
		if($user){
			$user->active=1;
			$user->save();
			return view('auth.confirm');
		} 
		else return '';
    }


    /**
     * Edit password.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function editpassword(Request $request)
    {
		$user = \App\User::where('id_user', $request->iduser)->first();

		if($user && password_verify($request->oldpassword, $user->password)){
			$user->password=password_hash($request->newpassword,PASSWORD_DEFAULT);
			$user->save();
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
    public function updateprofile(Request $request)
    {

		if($request->has('iduser')){

			$result = \App\User::where('id', '=', $request->iduser)->first();
			if($result){
				$result->name=$request->name;
				$result->surname=$request->surname;
				$result->company=$request->company;
				$result->phone=$request->phone;
				$result->address=$request->address;
				$result->postalcode=$request->postalcode;
				$result->country=$request->country;
				$result->province=$request->province;
				$result->city=$request->city; 
				$result->save();
				return 1;
			}
			else return 0;
		}
		else return 0;
    }



}