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


class AuthController extends Controller
{
    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {

		if($request->has('email') && $request->has('password')){

			$result = \App\User::where('email', '=', $request->email)->first();
			if($result && password_verify($request->password, $result->password) && $result->active==1){
				Auth::login($result, false);
				return 1; 
			}
			elseif($result && password_verify($request->password, $result->password) && $result->active==0) {
				Mail::to($result->email)->send(new RegisterSent($result->confirmation_code));
				return 2;
			}
			else return 0;
		}
		else return 0;
    }

    /**
     * Effettua recover.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function dorecover(Request $request)
    {

		if($request->has('emailrec')){

			$result = \App\User::select('confirmation_code')->where('email', '=', $request->emailrec)->first();
			if($result){
				Mail::to($request->emailrec)->send(new RecoverSent($result->confirmation_code));
				return 1; 
			}
			else return 0;
		}
		else return 0;
    }

    /**
     * Visualizza pagina cambio password.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function nuovapassword(Request $request)
    {

		$user=\App\User::where('confirmation_code', $request->route('code'))->first();
		if($user){
			return view('auth.changepassword')->with('code',$request->route('code'));
		} 
		else return '';
    }

    /**
     * Cambio password.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function dochangep(Request $request)
    {

		$user=\App\User::where('confirmation_code', $request->code)->first();
		if($user){
			$user->password=password_hash($request->newp,PASSWORD_DEFAULT);
			$user->save();
			return 1;
		} 
		else return 0;
    }


    /**
     * Effettua logout.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function dologout()
    {

		Auth::logout();
		return redirect('/');
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

			$current = Carbon::now()->addDays(5);;
        	$dateExp = $current->format('Y-m-d');

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
			$user->trail = 1;
			$user->trail_date=$dateExp;

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
    public function myprofile(Request $request)
    {

		if($request->has('iduser')){

			$result = \App\User::where('id', '=', $request->iduser)->first();
			if($result){
				return $result; 
			}
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

    public function sendcontact(Request $request)
    {

	   	    $body='<!DOCTYPE html>
    	    <html lang="en">
    	    <head>
    	        <meta charset="UTF-8">
    	        <title>Document</title>
    	    </head>
    	    <body style="background:#fff;">
    	        <br><br>


    	        <table align="center" style="background:white; width: 595px ; border: 2px solid #663399; border-radius:20px;">
    	            <tr>
    	                <td>
    	                    <table width="595"  align="center" style="background:white; text-align:center; border-radius:20px;">
    	                        <tr>
    	                            <td><img moz-do-not-send="false" src="https://clickinvitation.com/assets/images/logo/logo2.png" alt="Click Invitation" height="32"></td>

    	                        </tr>
    	                    </table>
    	                    <table width="595"  cellpadding="20"  style="background:white;font-size:16px; color:#222; font-family: Calibri, arial, sans-serif !important; " >
   
    	                    
    	                    <tr>
    	                            <td>
    	                            
    	                            <strong>New contact from Clickinvitation</strong>
    	                            <strong>E-mail:</strong> <p>'.$request->email.'</p>
    	                            <strong>Name:</strong> <p>'.$request->name.'</p>
    	                            <strong>Subject:</strong> <p>'.$request->subject.'</p>
    	                            <strong>Message:</strong> <p>'.$request->message.'</p> 
                       
    	                            </td>
    	                        </tr>
    	                        
    	                    </table>


    	                    <table width="100%"  cellpadding="20"  style="background:#663399; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
    	                        <tr>                   
    	                            <td>
    	                                <p> This is an automated message please do not reply.<br>
    	                                    EventMasterPlan.com'.date('Y').'. All rights reserved.<br>
    	                                    <a style="color:white;"  href="mailto:info@clickinvitation.com">info@clickinvitation.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	                                    <a style="color:white;" href="https://clickinvitation.com/privacy-policy">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	                                    <a style="color:white;" href="https://clickinvitation.com/termos-of-use">Terms and Conditions</a>
    	                                </p>
    	                            </td>
    	                        </tr>
    	                    </table>                
    	                </td>
    	            </tr>
    	        </table>

    	        <br>

    	    </body>
    	    </html>';
    	    


    	    Mail::raw([], function($message) use($body){
    	        $message->from('info@clickinvitation.com');
    	        $message->to('info@clickinvitation.com');
    	        $message->subject('New contact request');
    	        $message->setBody($body, 'text/html');
    	        
    	    });

    	    return 'ok';
	}



}