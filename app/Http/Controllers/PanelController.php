<?php

namespace App\Http\Controllers;

use Auth;

use Validator;
use Carbon\Carbon;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use App\Mail\RecoverSent;
use App\Mail\RegisterSent;
use App\Mail\InvitationSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



//use Goutte\Client;
use GuzzleHttp\Promise\EachPromise;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request as Reqq;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Symfony\Component\HttpClient\HttpClient;



//{{ env('APP_URL') }}

class PanelController extends Controller
{
    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function ip(Request $request)
    {

        $ip = new \App\Ip;
        $ip->ip = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');

        $ip->save();
        return 'website';
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function newevent(Request $request)
    {
        $eventType = DB::table('event_type')->where(["id_eventtype" => $request->eventtype])->get();
        $event = new \App\Event;
        $event->type = $eventType[0]->title;
        $event->type_id = $request->eventtype;
        $event->name = $request->eventtitle;
        $event->date = $request->eventdate;
        $event->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
        $event->id_user = Auth::id();

        $event->save();
        return 1;
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function myevents(Request $request)
    {

        $events = \App\Event::where('id_user', Auth::id())->get();
        return $events;
    }

    public function getAnimations(Request $request)
    {
        $animations = DB::table('animation')->get();
        $event = DB::table('events')->where('id_event', $request->id_event)->first();
        // $event = DB::table('events')->where('id_event', $request->id_event)->get();
        // $eventType = DB::table('event_type')->where('id_eventtype', $event[0]->type_id)->first();
        // dd($eventType->id_animation);
        if ($event) {
            $animation_id = $event->id_animation;
        } else {
            $animation_id = null; // or handle the case when event is not found
        }
        return response()->json(['data' => $animations, 'animation_id' => $animation_id]);
    }
    public function saveAnimation(Request $request)
    {
        $event = DB::table('events')->where('id_event', $request->event_id)->update(['id_animation' => $request->id_animation]);
        // $eventType = DB::table('event_type')->where('id_eventtype', $event[0]->type_id)->update(['id_animation' => $request->id_animation]);
        return response()->json(['message' => 'Success']);
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delevent(Request $request)
    {

        $event = \App\Event::findOrFail($request->eventid)->delete();
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function showevent(Request $request)
    {

        $event = \App\Event::findOrFail($request->idevent);
        //$event->date=date('c', strtotime($event->date));

        $eventType = DB::table('event_type')->where(["id_eventtype" => $event->type_id])->get();

        $userData = DB::table('users')->where(["id" => $event->id_user])->get();

        $current = Carbon::now();
        $dateNow = $current->format('Y-m-d');

        if ($userData[0]->trail == 1) {
            if ($userData[0]->trail_date > $dateNow) {
                $event->trail = $userData[0]->trail;
            } else {
                DB::table('users')->where(["id" => $event->id_user])->update(["trail" => 0]);
                $event->trail = 0;
            }
        } else {
            $event->trail = 0;
        }

        $event->serverDateNow = $current->format('Y-m-d H:i:s');

        $photogallery = \App\Photogallery::where('id_event', $request->idevent)->get();

        foreach ($photogallery as $photo) {
            if (strlen($photo->guestCode) > 0) {
                // dd($photo->guestCode);
                $guestName = \App\Guest::where('code', $photo->guestCode)->first();
                // $photo->name = $guestName->name;
            } else {
                $photo->name = "MAIN";
            }
        }
        $event->photogallery = $photogallery;
        $event->isCouple = $eventType[0]->couple_event;
        $event->isCorporate = $eventType[0]->corporate_event;
        return $event;
    }


    /**
     * Pay.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {

        if (strlen($request->token) > 0) {
            $event = \App\Event::where('id_event', $request->idevent)->first();
            if ($event) {
                $event->paid = 1;
                $event->save();
            }
            $userID = DB::table('events')->where(['id_event' => $request->idevent])->get();
            $userName = DB::table('users')->where(['id' => $userID[0]->id_user])->get();
            $current = Carbon::now();
            $dateNow = $current->format('Y-m-d');
            $datas = [
                "id_event" => $request->idevent,
                "amount" => $request->amount,
                "date" => $dateNow,
                "token" => $request->token,
                "userName" => $userName[0]->name . " " . $userName[0]->surname,
            ];
            DB::table('amount_records')->insert($datas);
            $event = DB::table('events')->where('id_event', $request->idevent)->first();
            $user = $userName[0];

            self::paymentMail($user, $event);
            return 'ok';
        } else if (strlen($request->payerID) > 0) {
            $event = \App\Event::where('id_event', $request->idevent)->first();
            if ($event) {
                $event->paid = 1;
                $event->save();
            }
            $userID = DB::table('events')->where(['id_event' => $request->idevent])->get();
            $userName = DB::table('users')->where(['id' => $userID[0]->id_user])->get();
            $current = Carbon::now();
            $dateNow = $current->format('Y-m-d');
            $datas = [
                "id_event" => $request->idevent,
                "amount" => $request->amount,
                "date" => $dateNow,
                "token" => "Payer ID = " . $request->payerID,
                "userName" => $userName[0]->name . " " . $userName[0]->surname,
            ];
            DB::table('amount_records')->insert($datas);

            $event = DB::table('events')->where('id_event', $request->idevent)->first();
            $user = $userName[0];

            self::paymentMail($user, $event);
            return 'ok';
        }

        return 0;
    }

    public function paymentMail($user, $event)
    {

        $lang = App::getLocale();

        if (strlen($user->email) > 0) {
            $guestName = str_replace(" ", "+", $user->name);



            $body = '<!DOCTYPE html>
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
                                        <td><img moz-do-not-send="false" src="https://clickinvitation.com/assets/newimages/Group%201.svg" alt="Event masterplan" height="32"></td>

                                    </tr>
                                </table>
                                <table width="595"  cellpadding="20"  style="background:white;font-size:16px; color:#222; font-family: Calibri, arial, sans-serif !important; " >
                                <tr>
                                        <td>
                                        <div style="
                                        text-align: center;
                                        font-size: 1.3em;
                                        color: rebeccapurple;
                                        font-weight: 700;
                                        font-family: cursive;
                                    ">
                                    ' . $guestName . '
                                       
                                        </div>
                                        <div style="
                                        text-align: center;
                                        font-size: 1.3em;
                                        color: rebeccapurple;
                                        font-weight: 700;
                                        font-family: cursive;
                                    ">
                                        Payment Successful
                                       
                                        </div>
                                        <div style="
                                        text-align: center;
                                        font-size: 2em;
                                        color: #ff9900;
                                        font-weight: 700;
                                        font-family: cursive;
                                    "> ' . $event->name . ' <br/>
                                        ' . $event->type . '
                                        </div>
                                        </td>
                                </tr>    
                                
                                <tr>
                                        <td>
                                        
                                                                  
                                        </td>
                                    </tr>
                                    
                                </table>


                                <table width="100%"  cellpadding="20"  style="background:#663399; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
                                    <tr>                   
                                        <td>
                                            <p> This is an automated message please do not reply.<br>
                                                clickinvitation.com' . date('Y') . '. All rights reserved.<br>
                                                <a style="color:white;"  href="mailto:info@eventmasterplan.com">info@eventmasterplan.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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


            Mail::raw([], function ($message) use ($body, $user) {
                $message->from('info@clickinvitation.com');
                $message->to($user->email);
                $message->subject('Payment Successful');
                $message->setBody($body, 'text/html');
            });
        }
    }

    /**
     * Pay.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function paydatas(Request $request)
    {

        $datas = \App\Data::where('id_data', 1)->first();

        $subUsa = floatval($datas->subusa1 . '.' . $datas->subusa2);
        $tpsUsa = floatval($datas->tpsusa1 . '.' . $datas->tpsusa2);
        $tvqUsa = floatval($datas->tvqusa1 . '.' . $datas->tvqusa2);


        $subCA = floatval($datas->subcan1 . '.' . $datas->subcan2);
        $tpsCA = floatval($datas->tpscan1 . '.' . $datas->tpscan2);
        $tvqCA = floatval($datas->tvqcan1 . '.' . $datas->tvqcan2);

        $couponMsg;
        $discount = 0;
        $subUsao = 0;
        $subCAo = 0;

        if ($request->has('code')) {
            $code = \App\Code::where('code', $request->code)->first();
            $code = DB::table('coupon')->where(['code' => $request->code])->get();
            //return $code[0]->discount;
            $current = Carbon::now();
            $dateNow = $current->format('Y-m-d');

            if ($code) {

                if ($dateNow >= $code[0]->start_date && $dateNow <= $code[0]->expirydate) {
                    $couponUsed = DB::table('events')->where(['coupon_code' => $request->code])->count();
                    if ($couponUsed < $code[0]->count) {
                        $discount = $code[0]->discount;

                        $subUsao = $subUsa;
                        $subCAo = $subCA;
                        $subUsa = $subUsa - ($subUsa / 100 * $code[0]->discount);
                        $subCA = $subCA - ($subCA / 100 * $code[0]->discount);
                        DB::table('events')->where(['id_event' => $request->idevent])->update(['coupon_code' => $request->code]);
                    } else {
                        $couponMsg = "Invalid Coupon";
                    }
                } else {
                    $couponMsg = "Invalid Coupon";
                }
            }
        } else {

            $discount = 0;
            $subUsao = 0;
            $subCAo = 0;
        }


        $totusa = number_format($subUsa + (($subUsa / 100) * $tpsUsa) + (($subUsa / 100) * $tvqUsa), 2);
        $totcan = number_format($subCA + (($subCA / 100) * $tpsCA) + (($subCA / 100) * $tvqCA), 2);


        $totusaexp = explode(".", $totusa);
        $totcanexp = explode(".", $totcan);

        //$linkusa="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=".$totusaexp[0]."%2e".$totusaexp[1]."&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f".$request->idevent."%2fthankyou&currency_code=USD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";


        //$linkcan="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=".$totcanexp[0]."%2e".$totcanexp[1]."&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f".$request->idevent."%2fthankyou&currency_code=CAD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";


        $linkusa = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totusaexp[0] . "%2e" . $totusaexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $request->idevent . "%2fthankyou%3famount=" . $totusaexp[0] . "." . $totusaexp[1] . "&currency_code=USD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";


        $linkcan = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40clickinvitation%2ecom&lc=EN&item_name=click%2dinvitation&amount=" . $totcanexp[0] . "%2e" . $totcanexp[1] . "&button_subtype=services&no_note=1&no_shipping=1&rm=1&return=https%3a%2f%2fclickinvitation%2ecom%2fevent%2f" . $request->idevent . "%2fthankyou%3famount=" . $totcanexp[0] . "." . $totcanexp[1] . "&currency_code=CAD&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted";

        $newTvqUSA = number_format((($subUsa / 100) * $tvqUsa), 2, ".", "");
        $newTvqCA = number_format((($subCA / 100) * $tvqCA), 2, ".", "");

        $newTpsCan = number_format((($subCA / 100) * $tpsCA), 2, ".", "");
        $newTpsUSA = number_format((($subUsa / 100) * $tpsUsa), 2, ".", "");

        //return $discount;
        return '[{"subcan":"' . $subCA . ' CAD", "tpscan":"' . $newTpsCan . ' CAD", "tvqcan":"' . $newTvqCA . ' CAD", 
                  "subusa":"' . $subUsa . ' USD", "tpsusa":"' . $newTpsUSA . ' USD", "tvqusa":"' . $newTvqUSA . ' USD",
                  "totusa":"' . $totusa . ' USD","totcan":"' . $totcan . ' CAD", "linkcan":"' . $linkcan . ' CAD","linkusa":"' . $linkusa . ' CAD","discount":"' . $discount . '%","subusao":"' . $subUsao . ' USD","subcano":"' . $subCAo . ' CAD"}]';
    }

    public function paycheck(Request $request)
    {
        $event = \App\Event::where('id_event', $request->idevent)->first();
        $url = config('app.url');
        return ['is_paid' => $event->paid, 'url' => $url];
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function page(Request $request)
    {
        $event = \App\Event::where('id_event', $request->route('idevent'))->first();
        if ($event && $event->id_user == Auth::id())
            return view('panel.event')->with('event', $event);
        else
            return redirect('/panel');
    }

    public function translatePage(Request $req)
    {

        return __($req->route('page'));
    }

    public function animation(Request $req)
    {
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function editevent(Request $request)
    {

        $event = \App\Event::where('id_event', $request->idevent)->first();
        if ($event) {
            $event->name = $request->eventname;
            $event->date = $request->eventdate;
            $event->bridefname = $request->bridefname;
            $event->bridelname = $request->bridelname;
            $event->bridesummary = $request->bridesummary;
            $event->groomfname = $request->groomfname;
            $event->groomlname = $request->groomlname;
            $event->groomsummary = $request->groomsummary;
            $event->summary = $request->summary;
            $event->boolcerimony = $request->boolcerimony;
            $event->ceraddress = $request->ceraddress;
            $event->cercountry = $request->cercountry ? $request->cercountry : '';
            $event->cerprovince = $request->cerprovince ? $request->cerprovince : '';
            $event->cercity = $request->cercity ? $request->cercity : '';
            $event->cerpc = $request->cerpc ? $request->cerpc : '';
            $event->certime = $request->certime;
            $event->cerdesc = $request->cerdesc;
            $event->boolreception = $request->boolreception;
            $event->recaddress = $request->recaddress;
            $event->reccountry = $request->reccountry ? $request->reccountry : '';
            $event->recprovince = $request->recprovince ? $request->recprovince : '';
            $event->reccity = $request->reccity ? $request->reccity : '';
            $event->recpc = $request->recpc ? $request->recpc : '';
            $event->rectime = $request->rectime;
            $event->recdesc = $request->recdesc;
            $event->boolparty = $request->boolparty;
            $event->parname = $request->parname;
            $event->paraddress = $request->paraddress;
            $event->parcountry = $request->parcountry ? $request->parcountry : '';
            $event->parprovince = $request->parprovince ? $request->parprovince : '';
            $event->parcity = $request->parcity ? $request->parcity : '';
            $event->parpc = $request->parpc ? $request->parpc : '';
            $event->partime = $request->partime;
            $event->pardesc = $request->pardesc;
            $event->cerAddressLink = $request->cerAddressLink;
            $event->parAddressLink = $request->parAddressLink;
            $event->recAddressLink = $request->recAddressLink;



            if ($request->imgbride) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }
                $image = new \Imagick();
                $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->imgbride)));
                $image->setImageFormat('jpg');
                $results = $image->writeImages("public/event-images/" . $request->idevent . "/bride.jpg", true);
                $event->imgbride = "/event-images/" . $request->idevent . "/bride.jpg";
            }

            if ($request->imggroom) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }
                $image = new \Imagick();
                $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->imggroom)));
                $image->setImageFormat('jpg');
                $results = $image->writeImages("public/event-images/" . $request->idevent . "/groom.jpg", true);
                $event->imggroom = "/event-images/" . $request->idevent . "/groom.jpg";
            }

            $event->save();


            return 1;
        } else
            return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function editeventmail(Request $request)
    {

        $event = \App\Event::where('id_event', $request->idevent)->first();
        if ($event) {
            if ($request->has('atitle'))
                $event->atitle = $request->atitle;
            if ($request->has('asubtitle'))
                $event->asubtitle = $request->asubtitle;
            if ($request->has('atext'))
                $event->atext = $request->atext;
            if ($request->has('ititle'))
                $event->ititle = $request->ititle;
            if ($request->has('isubtitle'))
                $event->isubtitle = $request->isubtitle;
            if ($request->has('itext'))
                $event->itext = $request->itext;
            if ($request->has('mtitle'))
                $event->mtitle = $request->mtitle;
            if ($request->has('msubtitle'))
                $event->msubtitle = $request->msubtitle;
            if ($request->has('mtext'))
                $event->mtext = $request->mtext;



            if ($request->photo) {
                $image = new \Imagick();
                $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->photo)));
                $image->setImageFormat('jpg');
                if ($request->type == 'invitation')
                    $results = $image->writeImages("public/event-images/" . $request->idevent . "/invitation.jpg", true);
                if ($request->type == 'messaging')
                    $results = $image->writeImages("public/event-images/" . $request->idevent . "/messaging.jpg", true);
                if ($request->type == 'acknowledgment')
                    $results = $image->writeImages("public/event-images/" . $request->idevent . "/acknowledgment.jpg", true);
            }

            $event->save();


            return 1;
        } else
            return 0;
    }




    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function editplan(Request $request)
    {

        $event = \App\Event::where('id_event', $request->idevent)->first();
        if ($event) {


            if ($request->imgplan) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }
                $image = new \Imagick();
                $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->imgplan)));
                $image->setImageFormat('jpg');
                $results = $image->writeImages("public/event-images/" . $request->idevent . "/plan.jpg", true);
                $event->imgplan = "/event-images/" . $request->idevent . "/plan.jpg";
            }

            $event->save();


            return 1;
        } else
            return 0;
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function showimages(Request $request)
    {

        $event = \App\Event::findOrFail($request->idevent);
        return $event;
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function saveimages(Request $request)
    {
        // dd($request->all());
        $event = \App\Event::where('id_event', $request->idevent)->first();
        if ($event) {

            //$event->pardesc=$request->pardesc;


            // if($request->mainimage){
            //     if (!file_exists('public/event-images/'.$request->idevent)) { mkdir('public/event-images/'.$request->idevent, 0777, true); }
            //     $image = new \Imagick();
            //     $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->mainimage)));
            //     $image->setImageFormat('jpg');
            //     $results = $image->writeImages("public/event-images/".$request->idevent."/mainimage.jpg", true);
            //     $event->mainimage="/event-images/".$request->idevent."/mainimage.jpg";
            //     $event->save();
            // }
            if ($request->file('mainimage')) {
                $image = $request->file('mainimage');
                $filename = time() . '.' . $image->extension();
                // dd($filename);
                $image->move(public_path('event-images/' . $request->idevent), $filename);
                $event->mainimage = "/event-images/" . $request->idevent . "/" . $filename;
                $event->save();
            }


            if ($request->cerimg) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }
                $image = new \Imagick();
                $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->cerimg)));
                $image->setImageFormat('jpg');
                $results = $image->writeImages("public/event-images/" . $request->idevent . "/cerimg.jpg", true);
                $event->cerimg = "/event-images/" . $request->idevent . "/cerimg.jpg";
                $event->save();
            }

            if ($request->recimg) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }
                $image = new \Imagick();
                $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->recimg)));
                $image->setImageFormat('jpg');
                $results = $image->writeImages("public/event-images/" . $request->idevent . "/recimg.jpg", true);
                $event->recimg = "/event-images/" . $request->idevent . "/recimg.jpg";
                $event->save();
            }

            if ($request->parimg) {
                if (!file_exists('public/event-images/' . $request->idevent)) {
                    mkdir('public/event-images/' . $request->idevent, 0777, true);
                }
                $image = new \Imagick();
                $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $request->parimg)));
                $image->setImageFormat('jpg');
                $results = $image->writeImages("public/event-images/" . $request->idevent . "/parimg.jpg", true);
                $event->parimg = "/event-images/" . $request->idevent . "/parimg.jpg";
                $event->save();
            }

            // if($request->gall){
            //     if (!file_exists('public/event-images/'.$request->idevent.'/photogallery')) { mkdir('public/event-images/'.$request->idevent.'/photogallery', 0777, true); }
            //     foreach($request->gall as $photo){
            //         $photogallery= new \App\Photogallery;
            //         $photogallery->id_event=$request->idevent;
            //         $photogallery->guestCode=$request->guestCode;
            //         $photogallery->save();

            //         $image = new \Imagick();
            //         $image->readimageblob(base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $photo)));

            //         $width=1298; $height=649;


            //         $ratio = $width / $height;

            //         $old_width = $image->getImageWidth();
            //         $old_height = $image->getImageHeight();
            //         $old_ratio = $old_width / $old_height;

            //         if(($old_width > $old_height) && ($old_width > 1298)){
            //             $old_ratio = $old_width / $old_height; 
            //             $new_width = $width;
            //             $new_height = $width / $old_width * $old_height;
            //             if($new_height > 649){
            //                 $new_width = 649 / $new_height * $new_width;
            //             }       
            //         }
            //         elseif(($old_height > $old_width) && ($old_height > 649)){
            //             $old_ratio = $old_height / $old_width;
            //             $new_width = $height / $old_height * $old_width;
            //             $new_height = $height;
            //         }
            //         else{
            //             $new_height = $old_height;
            //             $new_width = $old_width;
            //         }

            //         $image->scaleImage($new_width,$new_height,true);
            //         $image->setImageBackgroundColor('lightgrey');
            //         $w = $image->getImageWidth();
            //         $h = $image->getImageHeight();
            //         $image->extentImage(1298,649,($w-1298)/2,($h-649)/2);   

            //         $image->setImageFormat('jpg');

            //         $results = $image->writeImages("public/event-images/".$request->idevent."/photogallery/".$photogallery->id_photogallery.".jpg", true);
            //     }

            // }

            if ($request->hasFile('gall')) {
                if (!file_exists('public/event-images/' . $request->idevent . '/photogallery')) {
                    mkdir('public/event-images/' . $request->idevent . '/photogallery', 0777, true);
                }

                foreach ($request->file('gall') as $photo) {
                    if ($photo->isValid()) {
                        $photogallery = new \App\Photogallery;
                        $photogallery->id_event = $request->idevent;
                        $photogallery->guestCode = $request->guestCode;
                        $photogallery->save();

                        $fileName = $photo->getClientOriginalName();
                        $photo->move(public_path('event-images/' . $request->idevent . '/photogallery'), $photogallery->id_photogallery . ".jpg");
                    }
                }

                return redirect()->back();
            }


            return redirect()->back();
        } else
            return 0;
    }



    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delphotogallery(Request $request)
    {

        $photogallery = \App\Photogallery::where('id_photogallery', $request->idphoto)->first();
        if ($photogallery && $photogallery->id_event == $request->idevent) {
            $photogallery->delete();
            if (file_exists('public/event-images/' . $request->idevent . '/photogallery/' . $request->idphoto . '.jpg')) {

                unlink('public/event-images/' . $request->idevent . '/photogallery/' . $request->idphoto . '.jpg');
            }
            return 1;
        }
    }








    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function mailinvitation(Request $request)
    {

        if ($request->route('idguest') != 'fake') {
            $guest = \App\Guest::where('id_guest', $request->route('idguest'))->first();
            if ($guest && $guest->id_event == $request->route('idevent')) {
                $event = \App\Event::where('id_event', $request->route('idevent'))->first();
                if ($event)
                    return view('mails.invitation')->with('event', $event)->with('guest', $guest)->with('fake', 0);
                else
                    return redirect('/');
            } else
                return redirect('/');
        } else {
            $event = \App\Event::where('id_event', $request->route('idevent'))->first();
            if ($event)
                return view('mails.invitation')->with('event', $event)->with('fake', 1);
            else
                return redirect('/');
        }
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function mailacknowledgment(Request $request)
    {

        if ($request->route('idguest') != 'fake') {
            $guest = \App\Guest::where('id_guest', $request->route('idguest'))->first();
            $cardId = \App\Card::where('id_event', $request->route('idevent'))->orderBy('id_card', 'desc')->first()->id_card;
            $lang = App::getLocale();
            if ($guest && $guest->id_event == $request->route('idevent')) {
                $event = \App\Event::where('id_event', $request->route('idevent'))->first();
                if ($event)
                    return view('mails.acknowledgment')->with('event', $event)->with('guest', $guest)->with('cardId', $cardId)->with('lang', $lang)->with('fake', 0);
                else
                    return redirect('/');
            } else
                return redirect('/');
        } else {
            $event = \App\Event::where('id_event', $request->route('idevent'))->first();
            if ($event)
                return view('mails.acknowledgment')->with('event', $event)->with('fake', 1);
            else
                return redirect('/');
        }
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function mailmessaging(Request $request)
    {

        if ($request->route('idguest') != 'fake') {
            $guest = \App\Guest::where('id_guest', $request->route('idguest'))->first();
            if ($guest && $guest->id_event == $request->route('idevent')) {
                $event = \App\Event::where('id_event', $request->route('idevent'))->first();
                if ($event)
                    return view('mails.messaging')->with('event', $event)->with('guest', $guest)->with('fake', 0);
                else
                    return redirect('/');
            } else
                return redirect('/');
        } else {
            $event = \App\Event::where('id_event', $request->route('idevent'))->first();
            if ($event)
                return view('mails.messaging')->with('event', $event)->with('fake', 1);
            else
                return redirect('/');
        }
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function decline(Request $request)
    {

        $guest = \App\Guest::where('code', $request->guestcode)->first();
        if ($guest) {

            if ($request->decliner == "me") {
                $guest->declined = 1;
                $guest->id_table = 0;
                $guest->save();
            } elseif ($request->decliner == "all") {
                $guests = \App\Guest::where("parent_id_guest", $guest->id_guest)->get();
                foreach ($guests as $g) {
                    $g->declined = 1;
                    $guest->id_table = 0;
                    $g->save();
                }
            } else {
                $guest = \App\Guest::where('id_guest', $request->decliner)->first();
                if ($guest->declined == 0) {
                    $guest->id_table = 0;
                    $guest->declined = 1;
                } else
                    $guest->declined = 0;
                $guest->save();
            }
        }
        return 1;
    }



    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function sendinvitations(Request $request)
    {
        foreach ($request->guests as $guest) {

            $event = \App\Event::where('id_event', $request->idevent)->first();

            $body = '<!DOCTYPE html>
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
                                    <td><img moz-do-not-send="false" src="http://vps-3688cc7b.vps.ovh.net/assets/images/logo/logo2.png" alt="Event masterplan" height="32"></td>

                                </tr>
                            </table>
                            <table width="595"  cellpadding="20"  style="background:white;font-size:16px; color:#222; font-family: Calibri, arial, sans-serif !important; " >
                                <tr>
                                    <td>
                                        <img style="width: 594px;" moz-do-not-send="false" src="http://vps-3688cc7b.vps.ovh.net/event-images/' . $event->id_event . '/invitation.jpg" alt="main"><br>
                                        ' . html_entity_decode($event->ititle) . '
                                        ' . html_entity_decode($event->isubtitle) . '
                                        ' . html_entity_decode($event->itext) . '
                                        <br>                            
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 100px;">';
            if ($guest['members_number'] > 0)
                $body = $body . '<a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#6633ff;" href="http://vps-3688cc7b.vps.ovh.net/attending/' . $guest['code'] . '">
                                            ATTENDING
                                        </a>';
            $body = $body . '<a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#6633ff;" href="http://vps-3688cc7b.vps.ovh.net/gift-suggestion/' . $guest['code'] . '">
                                            GIFT SUGGESTION
                                        </a>
                                        <a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#6633ff;" href="http://vps-3688cc7b.vps.ovh.net/check-in/' . $guest['code'] . '">
                                            AT THE RECEPTION CHECK-IN
                                        </a>
                                        <a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#6633ff;" href="http://vps-3688cc7b.vps.ovh.net/add-photos/' . $guest['code'] . '">
                                            ADD YOUR PHOTOS
                                        </a>
                                        <a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#6633ff;" href="http://vps-3688cc7b.vps.ovh.net/sorry-cant/' . $guest['code'] . '">
                                            SORRY I CAN\'T
                                        </a>

                                        <a style="font-weight: bold; font-size: 17px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px; text-align: center; text-decoration: none; margin-bottom: 12px; display:block; color:white; background:#6633ff;" href="/website/' . $event->id_event . '">
                                            GO TO WEBSITE
                                        </a>
                                        <br><br>
                                    </td>
                                </tr>
                            </table>


                            <table width="100%"  cellpadding="20"  style="background:#663399; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
                                <tr>                   
                                    <td>
                                        <p> This is an automated message please do not reply.<br>
                                            EventMasterPlan.com' . date('Y') . '. All rights reserved.<br>
                                            <a style="color:white;"  href="mailto:info@eventmasterplan.com">info@eventmasterplan.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a style="color:white;" href="http://vps-3688cc7b.vps.ovh.net/privacy-policy">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a style="color:white;" href="http://vps-3688cc7b.vps.ovh.net/termos-of-use">Terms and Conditions</a>
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


            Mail::raw([], function ($message) use ($body, $guest) {
                $message->from('info@goldweb.it');
                $message->to($guest['email']);
                $message->subject('Eventmasterplan invitation');
                $message->setBody($body, 'text/html');
            });
        }
    }

    public function postCard(Request $request)
    {
        // dd($request->all());
        $card = \App\Card::where('id_event', $request->event_id)->get();
        if ($card && $card->count() > 0) {
            foreach ($card as $c) {
                $c->id_user = Auth::id();
                $c->id_event = $request->event_id;
                $c->title1 = $request->title1;
                $c->title2 = $request->title2;
                $c->title3 = $request->title3;
                $c->title4 = $request->title4;
                $c->titleFont = $request->titleFont;
                $c->titleColor = $request->titleColor;
                $c->name1 = $request->name1;
                $c->name2 = $request->name2;
                $c->cermony = $request->cermony;
                $c->cermonyFont = $request->cermonyFont;
                $c->cermonyColor = $request->cermonyColor;
                $c->other1 = $request->other1;
                $c->other2 = $request->other2;
                $c->other3 = $request->other3;
                $c->otherFont = $request->otherFont;
                $c->otherColor = $request->otherColor;
                $c->bgName = $request->bgName;
                $c->cardName = $request->cardName;
                $c->fontColor = $request->fontColor;
                $c->fontFamily = $request->fontFamily;
                $c->customCard = $request->customCard;
                $c->cardColorOut = $request->colorOut;
                $c->cardColorIn = $request->colorIn;
                $c->rsvp = $request->rsvp;
                $c->msgTitle = $request->msg;
                $c->envTitleFont = $request->envTitleFont;
                $c->envTitleColor = $request->envTitleColor;
                $c->save();
                $c->refresh();
            }
        } else {
            $card = new \App\Card;
            $card->id_user = Auth::id();
            $card->id_event = $request->event_id;
            $card->title1 = $request->title1;
            $card->title2 = $request->title2;
            $card->title3 = $request->title3;
            $card->title4 = $request->title4;
            $card->titleFont = $request->titleFont;
            $card->titleColor = $request->titleColor;
            $card->name1 = $request->name1;
            $card->name2 = $request->name2;
            $card->cermony = $request->cermony;
            $card->cermonyFont = $request->cermonyFont;
            $card->cermonyColor = $request->cermonyColor;
            $card->other1 = $request->other1;
            $card->other2 = $request->other2;
            $card->other3 = $request->other3;
            $card->otherFont = $request->otherFont;
            $card->otherColor = $request->otherColor;
            $card->bgName = $request->bgName;
            $card->cardName = $request->cardName;
            $card->fontColor = $request->fontColor;
            $card->fontFamily = $request->fontFamily;
            $card->customCard = $request->customCard;
            $card->cardColorOut = $request->colorOut;
            $card->cardColorIn = $request->colorIn;
            $card->rsvp = $request->rsvp;
            $card->msgTitle = $request->msg;
            $card->envTitleFont = $request->envTitleFont;
            $card->envTitleColor = $request->envTitleColor;
            $card->save();
        }


        return 1;
    }

    function getCard(Request $request)
    {
        $eventType = \App\Event::where(['id_event' => $request->route("event_id")])->get();
        $cardData = \App\Card::select("*")->where([['id_event', '=', $request->route("event_id")]])->orderBy('id_card', 'desc')->get();
        $isCouple = '';
        $isCouple = DB::table('event_type')->where(['id_eventtype' => $eventType[0]->type_id])->get();

        $cardImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'card'])->get();
        $bgImgs = DB::table('cards_upload')->where(['id_eventtype' => $eventType[0]->type_id, 'type' => 'background'])->get();

        $stickers = DB::table('stickers')->get();

        if ($cardData->count() > 0) {

            $isCouple = DB::table('event_type')->where(['id_eventtype' => $eventType[0]->type_id])->get();
            $cardData[0]->eventType = $eventType[0]->type;
            $cardData[0]->isCouple = $isCouple[0]->couple_event;
            $cardData[0]->eventCouple = $request->route("event_id");
            $cardData[0]->result = "1";
            $cardData[0]->cardImgs = $cardImgs;
            $cardData[0]->bgImgs = $bgImgs;
            $cardData[0]->stickers = $stickers;
            return $cardData[0];
        }
        return ["result" => 0, 'eventType' => $eventType[0]->type, 'isCouple' => $isCouple[0]->couple_event, 'cardImgs' => $cardImgs, 'bgImgs' => $bgImgs, 'stickers' => $stickers];
    }



    private static $jsonFolderCreated = false;

    public function saveBlob(Request $request)
    {
        try {
            if (!self::$jsonFolderCreated) {
                $folderName = 'Json';
                $folderPath = public_path($folderName);
                if (!File::exists($folderPath)) {
                    File::makeDirectory($folderPath, 0777, true, true);
                }
                self::$jsonFolderCreated = true;
            }
            $base64Image = $request->data_url;
            $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
            $decodedImage = base64_decode($base64Image);
            $imagePath = public_path('card-images/' . $request->event_id . '.png');
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            file_put_contents($imagePath, $decodedImage);
            $requestData = json_encode($request->all(), JSON_PRETTY_PRINT);
            $filename = $request->event_id . '.json';
            $filePath = public_path('Json/' . $filename);
            File::put($filePath, $request->json_blob);

            $event = DB::table('events')->where('id_event', $request->event_id)->get();

            // return $event;
            if ($event) {
                DB::table('events')->where('id_event', $request->event_id)->update([
                    'json' => $filename
                ]);
            } else {
                DB::table('events')->insert([
                    'id_event' => $request->event_id,
                    'json' => $filename,
                ]);
            }

            return response()->json(['message' => 'JSON file saved successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function getJson(Request $request)
    {
        $event = DB::table('events')->where('id_event', $request->id)->first();

        if ($event) {
            return response()->json(['data' => $event->json]);
        } else {
            return response()->json(['message' => 'Event not found'], 404);
        }
    }
    public function SaveSetting(Request $request)
    {
        dd($request);
    }


    function uploadImg(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'file' => 'required|image|max:1024',
        ]);
        if ($valid->passes()) {
            $input['image'] = time() . '.' . $req->file->extension();
            $req->file->move(public_path('assets/images/cardAnimation'), $input['image']);
            \App\Card::where('id_event', '=', $req->event)
                ->orderBy('id_card', 'desc')
                ->update([
                    'customCard' => 1
                ]);

            return response()->json(['imgName' => $input['image']]);
        }
        return response()->json(['error' => $valid->errors()->all()]);
    }

    public function getCSRFToken()
    {
        return csrf_token();
    }

    public function cardPreviewNew(Request $request)
    {

        // $cardID =$request->route("data");
        $cardData = \App\Card::select("*")->where([['id_card', '=', $request->route("id")]])->get();

        $eventData = \App\Event::select("*")->where(['id_event' => $cardData[0]->id_event])->get();
        $eventType = DB::table('event_type')->where(['id_eventtype' => $eventData[0]->type_id])->get();
        // $animation = DB::table('animation')->where(['id_animation' => $eventType[0]->id_animation])->get();
        $animation = DB::table('events')->where(['id_event' => $cardData[0]->id_event])->first();
        $animation = DB::table('animation')->where(['id_animation' => $animation->id_animation])->get();

        return view($animation[0]->file_animation_preview, ["cardData" => $cardData, "eventData" => $eventData]);
    }

    public function cardPreview(Request $request)
    {

        $cardData = $request->route("data");

        return view('cardPreview', ["data" => $cardData]);
    }


    public function cardInvite(Request $request)
    {

        $cardData = \App\Card::select("*")->where([['id_card', '=', $request->route("id")]])->get();

        $eventData = \App\Event::select("*")->where(['id_event' => $cardData[0]->id_event])->get();
        $eventType = DB::table('event_type')->where(['id_eventtype' => $eventData[0]->type_id])->get();

        return view('cardInvitation', ["card" => $cardData, "guestCode" => $request->route("guestCode"), "isCouple" => $eventType[0]->couple_event]);
    }

    public function cardInviteLang(Request $req)
    {
        $cardData = \App\Card::select("*")->where([['id_card', '=', $req->route("id")]])->get();

        $lang = $req->route("lang");

        $eventData = \App\Event::select("*")->where(['id_event' => $cardData[0]->id_event])->get();
        $eventType = DB::table('event_type')->where(['id_eventtype' => $eventData[0]->type_id])->get();

        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }

        App::setLocale($lang);

        return view('cardInvitation', ["card" => $cardData, "guestCode" => $req->route("guestCode"), "lang" => $lang, "isCouple" => $eventType[0]->couple_event]);
    }

    public function cardInviteLangName(Request $req)
    {
        $cardData = \App\Card::select("*")->where([['id_card', '=', $req->route("id")]])->get();

        $eventData = \App\Event::select("*")->where(['id_event' => $cardData[0]->id_event])->get();
        $eventType = DB::table('event_type')->where(['id_eventtype' => $eventData[0]->type_id])->get();

        $lang = $req->route("lang");
        $name = $req->route("name");
        $name = str_replace("+", " ", $name);
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        App::setLocale($lang);

        $guest = \App\Guest::where('code', $req->route("guestCode"))->first();
        if ($guest->opened != 2) {
            $guest->opened = 1;
            $guest->save();
        }




        return view('cardInvitation', ["card" => $cardData, "guestCode" => $req->route("guestCode"), "lang" => $lang, 'guestName' => $name, "isCouple" => $eventType[0]->couple_event]);
    }

    // public function cardInviteLangNameNew(Request $req)
    // {
    //     $cardData = \App\Card::select("*")->where([['id_card', '=', $req->route("id")]])->get();
    //     $eventData = \App\Event::select("*")->where(['id_event' => $cardData[0]->id_event])->get();
    //     $eventType = DB::table('event_type')->where(['id_eventtype' => $eventData[0]->type_id])->get();

    //     $lang = $req->route("lang");
    //     $name = $req->route("name");
    //     $name = str_replace("+", " ", $name);
    //     if (array_key_exists($lang, Config::get('languages'))) {
    //         Session::put('applocale', $lang);
    //     }
    //     App::setLocale($lang);

    //     $guest = \App\Guest::where('code', $req->route("guestCode"))->first();
    //     if ($guest) {
    //         if ($guest->opened != 2) {
    //             $guest->opened = 1;
    //             $guest->save();
    //         }
    //     }

    //     // $animation = DB::table('animation')->where(['id_animation' => $eventType[0]->id_animation])->get();
    //     $animation = DB::table('events')->where(['id_event' => $cardData[0]->id_event])->first();
    //     $animation = DB::table('animation')->where(['id_animation' => $animation->id_animation])->get();

    //     return view($animation[0]->file_animation, ["card" => $cardData, "guestCode" => $req->route("guestCode"), "lang" => $lang, 'guestName' => $guest->name, "isCouple" => $eventType[0]->couple_event, "eventType" => $eventType, "eventData" => $eventData]);
    // }
    public function cardInviteLangNameNew(Request $req)
    {
        // Fetch card data
        $cardData = \App\Card::where('id_card', $req->route("id"))->get();
        if ($cardData->isEmpty()) {
            // Handle the case when no card data is found
            abort(404, 'Card data not found');
        }
        $card = $cardData->first(); // Get the first item from the collection
        
        // Fetch event data
        $eventData = \App\Event::where('id_event', $card->id_event)->get();
        if ($eventData->isEmpty()) {
            // Handle the case when no event data is found
            abort(404, 'Event data not found');
        }
        $event = $eventData->first(); // Get the first item from the collection
        
        // Fetch event type data
        $eventType = DB::table('event_type')->where('id_eventtype', $event->type_id)->get();
        if ($eventType->isEmpty()) {
            // Handle the case when no event type data is found
            abort(404, 'Event type data not found');
        }
        $eventType = $eventType->first(); // Get the first item from the collection
        
        $lang = $req->route("lang");
        $name = $req->route("name");
        $name = str_replace("+", " ", $name);
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        App::setLocale($lang);
        
        $guest = \App\Guest::where('code', $req->route("guestCode"))->first();
        if ($guest) {
            if ($guest->opened != 2) {
                $guest->opened = 1;
                $guest->save();
            }
        }
        
        // Fetch animation data
        $animation = DB::table('events')->where('id_event', $card->id_event)->first();
        if (!$animation) {
            // Handle the case when no animation data is found
            abort(404, 'Animation data not found');
        }
        
        $animationDetails = DB::table('animation')->where('id_animation', $animation->id_animation)->first();
        if (!$animationDetails) {
            // Handle the case when no animation details are found
            abort(404, 'Animation details not found');
        }
    // dd($animationDetails);
        // Return the view with the necessary data
        return view($animationDetails->file_animation, [
            "card" => $cardData,
            "guestCode" => $req->route("guestCode"),
            "lang" => $lang,
            'guestName' => ($guest) ? $guest->name : null, // Handle the case when guest is not found
            "isCouple" => $eventType->couple_event,
            "eventType" => $eventType,
            "eventData" => $eventData
        ]);
    }
    
    


    public function openPanel(Request $req)
    {
        $eventList = DB::table('event_type')->get();
        return view('panel.panel', ['eventList' => $eventList]);
    }

    public function sendSMS(Request $req)
    {
        $guest = DB::table('guests')->where('id_guest', $req->guestID)->first();
        $cardId = DB::table('cards')->where('id_card', $req->eventID)->first();
        $event = DB::table('events')->where('id_event', $cardId->id_event)->first();
        $lang = App::getLocale();

        $guestName = str_replace(" ", "+", $guest->name);

        if (strlen($guest->phone) > 0) {
            $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest->phone, 'Body' => $cardId->msgTitle . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang];
            if ($lang == 'en') {
                $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest->phone, 'Body' => $cardId->msgTitle . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang];
            } elseif ($lang == 'fr') {
                $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest->phone, 'Body' => $cardId->msgTitle . "\n\n" . 'Vous avez une invitation pour' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang];
            }
            //$params=['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => 'You Got Invitation For '.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$guest['code'].'/'.$lang];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/AC23420c2979a6b17c66be8716156b3424/Messages.json');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERPWD, 'AC23420c2979a6b17c66be8716156b3424:af04ad9f56df5b0132389583a0e46061');
            $data = curl_exec($ch);
            curl_close($ch);
        }
    }

    public function sendWhatsapp(Request $req)
    {

        $guest = DB::table('guests')->where('id_guest', $req->guestID)->first();
        $cardId = DB::table('cards')->where('id_card', $req->eventID)->first();
        $event = DB::table('events')->where('id_event', $cardId->id_event)->first();
        $lang = App::getLocale();

        $url = "https://graph.facebook.com/v16.0/112950588286835/messages";

        if (strlen($guest->whatsapp) > 0) {
            $guestName = str_replace(" ", "+", $guest->name);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer EAAJNk9TfhxABAKCjktSgOtjFlLLlQXjsRzZAkNms6Pok0XFXMPC1GehQldqhs8cacWAHrzGjH3WX6KzJHNRBAg5Ely4VIsZAkG9OIRLVqCp9S8QUmIGJCTj2vDLZBbVOwYheZBYwcm5yD7qHzAaRNDn9ZBvbeapp1LDYfvesd4biIv58YTzub', 'Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $data3 = [

                "type" => "body",
                "parameters" => [
                    "type" => "text",
                    "text" => ""
                ]
            ];

            $data2 = [
                "name" => "sample_issue_resolution",
                "language" => ["code" => "en_US"],
                "components" => $data3
            ];


            $data = array(
                "messaging_product" => "whatsapp",
                "to" => $guest->whatsapp,
                "type" => "template",
                "preview_url" => true,
                "template" => array(
                    "name" => "clickinvitation_wedding_template_2",
                    "language" => array("code" => $lang),
                    "components" => array(
                        [
                            "type" => "body",
                            "parameters" => array(
                                [
                                    "type" => "text",
                                    "text" => $event->name . ' ' . $event->type
                                ],
                                [
                                    "type" => "text",
                                    "text" => 'https://clickinvitation.com/cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guestName . '/' . $lang
                                ],
                                [
                                    "type" => "text",
                                    "text" => $cardId->msgTitle . " "
                                ]
                            )
                        ]
                    )
                )
            );



            $fields_string = json_encode($data);
            //echo $fields_string;
            echo $fields_string;
            echo "<br/>";
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);

            $resp = curl_exec($curl);
            curl_close($curl);
        }
    }

    public function sendEmail(Request $req)
    {
        $guest = DB::table('guests')->where('id_guest', $req->guestID)->first();
        $cardId = DB::table('cards')->where('id_card', $req->eventID)->first();
        $event = DB::table('events')->where('id_event', $cardId->id_event)->first();
        $lang = App::getLocale();

        if (strlen($guest->email) > 0) {
            $guestName = str_replace(" ", "+", $guest->name);

            $dateString = $event->date;
            $timestamp = strtotime($dateString);
            $formattedDate = date("l, F j, Y", $timestamp);

            $cerTime = $event->certime;
            $ConvertedCerTime = strtotime($cerTime);
            $formattedCerTime = date("g:i A l, F j, Y", $ConvertedCerTime);


            $recTime = $event->rectime;
            $ConvertedRecTime = strtotime($recTime);
            $formattedRecTime = date("g:i A l, F j, Y", $ConvertedRecTime);
            if ($lang == 'en') {
                $body = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Document</title>
                </head>
                <body style="background: #fff!important;">
                    <br><br>


                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td align="center" style="padding:0 10px;color:#777777"><br>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:650px">
                                        <tbody>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <table width="100%" cellpadding="0" bgcolor="white!important" cellspacing="0"
                                                        style="background-color:white!important;width:100%;border-radius:10px;border:1px solid #e8e8e8;border-collapse:separate">
                                                        <tbody>
                                                        <tr>
                                                                <td
                                                                    style="background-color:#5a5a5a;text-align:center;padding:10px 15px;border-radius:10px 10px 0px 0px">
                                                                    <table width="100%" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="top" style="color:#ffffff"><img
                                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                                        alt="Click Invitation" style="vertical-align:middle; width: 125px;"
                                                                                        class="CToWUd" data-bit="iit"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding:0 15px 0 15px;font-family:"Open Sans",Helvetica,Arial;font-size:14px; text-align:center;">
                                                                    <br>
                                                                    <p style="font-size:16px;color:#333333;text-align:center">
                                                                        ' . $event->groomfname . ' &amp; ' . $event->bridefname . ' sent you an invitation for</p>
                                                                    <p style="font-size:24px;color:#333333;text-align:center">
                                                                        Wedding of ' . $event->groomfname . ' &amp; ' . $event->bridefname . '</p>
                                                                    <p style="font-size:14px;text-align:center">' . $formattedDate . '</p>
                                                                    <p style="margin-top:20px"></p>
                                                                    <p style="text-align:center">
                                                                    <a href="' . env('APP_URL') . 'cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guest->name . '/' . $lang . '"
                                                                    style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                    target="_blank"
                                                                    onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                    onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Open
                                                                    Invitation</a>
                                                                    </p>
                                                                    <p style="text-align:center"><a
                                                                            href="' . env('APP_URL') . 'cardInvitations/' . $cardId->id_card . '/' . $guest->code . '/' . $guest->name . '/' . $lang . '"
                                                                            target="_blank"><img
                                                                                src="' . asset('card-images') . '/' . $event->id_event . '.png"
                                                                                border="0" style="margin-bottom:20px;max-width:100%"
                                                                                class="CToWUd" data-bit="iit"></a>
                                                                    </p>
                                                                    <p style="font-style:italic;font-size:13px;text-align:center">
                                                                        This email is personalized for you. Please do not forward.</p> <br />

                                                                    <p style="font-style:italic;font-size:13px;text-align:center">
                                                                    <a href="' . env('APP_URL') . 'check-in/' . $cardId->id_card . '/' . $guest->code    . '/' . $lang . '" style="margin-left:5px;color:#2bb573;text-decoration:none" target="_blank">
                                                                    Check In</a>
                                                                    </p>
                                                                    <table width="70%" cellpadding="0" cellspacing="0"
                                                                        style="margin:0 auto;text-align:center;margin-bottom:10px;border-top:1px solid #ebe9e9;font-size:14px;color:#777777">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <p style="font-weight:bold;margin:15px 5px 5px 5px">
                                                                                        Ceremony</p>
                                                                                    <p style="margin:5px">' . $event->ceraddress . ', ' . $event->cercity . ', ' . $event->cercountry . ', ' . $event->cerprovince . ', ' . $event->cerpc . '<a
                                                                                            href="' . $event->cerAddressLink . '"
                                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="' . $event->cerAddressLink . '">(View
                                                                                            Map)</a></p>
                                                                                    <p style="margin:5px"><span
                                                                                            style="white-space:nowrap">' . $formattedCerTime . '</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                                        style="margin:0 auto;text-align:center;border-top:1px solid #ebe9e9;background:#383838;font-size:14px;color:white;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <p style="font-weight:bold;margin:15px 5px 5px 5px">Reception</p>
                                                                                    <p style="margin:5px">' . $event->recaddress . ', ' . $event->reccity . ', ' . $event->reccountry . ', ' . $event->recprovince . ', ' . $event->recpc . '<a
                                                                                            href="' . $event->recAddressLink . '"
                                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="' . $event->recAddressLink . '">(View
                                                                                            Map)</a></p>
                                                                                    <p style="margin:5px"><span
                                                                                            style="white-space:nowrap"> ' . $formattedRecTime . '</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="background-color:#777;text-align:center;padding:10px 15px;border-radius:0 0 10px 10px">
                                                                    <table width="100%" cellpadding="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="top" style="color:#ffffff">Powered
                                                                                    by&nbsp;&nbsp;&nbsp;<img
                                                                                        src="https://clickinvitation.com//assets/images/logo/logoNewWhite.png"
                                                                                        alt="Click Invitation" style="vertical-align:middle; width: 115px;"
                                                                                        class="CToWUd" data-bit="iit"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="padding-top:10px;padding-bottom:20px;text-align:center;line-height:2;color:#777777;font-size:12px">
                                                                    Copyright © 2024 ClickInvitation. All rights reserved.<br>
                                                                    +1 (438) 303-9948<br>
                                                                    <a href="mailto:Info@Clickinvitation.Com"
                                                                        target="_blank">Info@Clickinvitation.Com</a> <a
                                                                        href="https://clickinvitation.com/contact" target="_blank">
                                                                        clickinvitation.com/contact</a><a></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                </body>
                </html>';
            } elseif ($lang == 'fr') {
                $body = '<!DOCTYPE html>
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
                                        <td><img moz-do-not-send="false" src="https://clickinvitation.com/assets/newimages/Group%201.svg" alt="Event masterplan" height="32"></td>

                                    </tr>
                                </table>
                                <table width="595"  cellpadding="20"  style="background:white;font-size:16px; color:#222; font-family: Calibri, arial, sans-serif !important; " >
                                <tr>
                                        <td>
                                        <div style="
                                        text-align: center;
                                        font-size: 1.3em;
                                        color: rebeccapurple;
                                        font-weight: 700;
                                        font-family: cursive;
                                    ">
                                    Vous avez une invitation pour
                                       
                                        </div>
                                        <div style="
                                        text-align: center;
                                        font-size: 2em;
                                        color: #ff9900;
                                        font-weight: 700;
                                        font-family: cursive;
                                    "> ' . $event->name . ' <br/>
                                        ' . $event->type . '
                                        </div>
                                        </td>
                                </tr>    
                                
                                <tr>
                                        <td>
                                        
                                        <a href="https://clickinvitation.com/cardInvitation/' . $cardId->id_card . '/' . $guest->code . '/' . $guest->name . '/' . $lang . '" style="
                                        background: #6633ff;
                                        color: white;
                                        padding: 20px;
                                        border-radius: 15px;
                                        text-decoration: none;
                                        font-size: 1.2em;
                                        font-weight: 600;
                                        display: block;
                                        margin: 10px auto;
                                        text-align: center;
                                        width: 250px;
                                    ">Cliquez ici pour voir la convocation</a>                            
                                        </td>
                                    </tr>
                                    
                                </table>


                                <table width="100%"  cellpadding="20"  style="background:#663399; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
                                    <tr>                   
                                        <td>
                                            <p> This is an automated message please do not reply.<br>
                                                EventMasterPlan.com' . date('Y') . '. All rights reserved.<br>
                                                <a style="color:white;"  href="mailto:info@eventmasterplan.com">info@eventmasterplan.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a style="color:white;" href="https://clickinvitation.com/privacy-policy">Politique de confidentialité</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a style="color:white;" href="https://clickinvitation.com/termos-of-use">Termes et conditions</a>
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
            }


            Mail::raw([], function ($message) use ($body, $guest, $event, $cardId) {
                $message->from('info@clickinvitation.com');
                $message->to($guest->email);
                if (strlen($cardId->msgTitle) > 0) {
                    $message->subject($cardId->msgTitle);
                } else {
                    $message->subject($event->name . ' Invitation');
                }

                $message->setBody($body, 'text/html');
            });

            return "OK";
        }
        return response()->json($guest);
    }

    public function sendtestEmail(Request $req)
    {
        Mail::raw([], function ($message) {
            $message->from('info@clickinvitation.com');
            $message->to("hafiz.hanif@nxfy.io");

            $message->subject('test Invitation');

            $message->setBody("testing here", 'text/html');
        });
    }

    public function getTemplates($id)
    {
        $event = \App\Event::findOrFail($id);
        $templates = DB::table('templates')->where('type_id', $event->type_id)->get();
        return response()->json(['data' => $templates]);
    }
    public function getTemplateWithId($id)
    {
        $templates = DB::table('templates')->where('id', $id)->get();
        return response()->json(['data' => $templates]);
    }

    public function guestCanSelectSeats(Request $request)
    {
        $event = \App\Event::where('id_event', $request->idevent)->first();
        $event->update([
            'guestCanSelectSeats' => $request->guestCanSelectSeats
        ]);
        return $event;
    }
}