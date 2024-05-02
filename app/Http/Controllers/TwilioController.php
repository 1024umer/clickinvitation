<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\RegisterSent;
use App\Mail\RecoverSent;
use App\Mail\InvitationSent;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Psr7\Request as Reqq;
use GuzzleHttp\Promise\EachPromise;

use Twilio\Rest\Client as twilioClient;
use Illuminate\Support\Facades\App;

class TwilioController extends Controller
{


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
            $cardId = \App\Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first();

            $guestName = str_replace(" ", "+", $guest['name']);
            $guestTable = DB::table('tables')->where('id_table', $guest['id_table'])->first();

            $lang = App::getLocale();
            if ($request->has('email') && $request->email != 0 && $guest['email']) {
                // if (!file_exists('/images/' . $guest['id_guest'] . $guest['code'] . '.png')) {
                //     //Generate QR Code if not exists
                //     $lang = Session('applocale');
                //     if ($lang == "en") {
                //         $url = url('/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . 'en');
                //     } else if ($lang == "fr") {
                //         $url = url('/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . 'fr');
                //     } else {
                //         $url = url('/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . 'en');
                //     }
                //     require_once 'C:\xampp 7.4.1\htdocs\Clickinvitation\app\Http\Controllers/phpqrcode/qrlib.php';
                //     // require_once '/var/www/html/clickinvitation/app/Http/Controllers/phpqrcode/qrlib.php';

                //     $path = 'images/';
                //     $qrcode = $path . $guest['id_guest'] . $guest['code'] . '.png';
                //     if (!file_exists($qrcode)) {
                //         \QRcode::png($url, $qrcode, 'H', 4, 4);
                //     };
                //     //Generate QR Code if not exists
                // }

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

                    if ($event->type == "CORPORATE") {
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
                                                                                    ' . $cardId['msgTitle'] . '</p>
                                                                                <p style="font-size:14px;text-align:center">' . $formattedDate . '</p>
                                                                                <p style="margin-top:20px"></p>
                                                                                <p style="text-align:center">
                                                                                <a href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                target="_blank"
                                                                                onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Open
                                                                                Invitation</a>
                                                                                </p>

                                                                                <p style="text-align:center">
                                                                                <a href="' . env('APP_URL') .'/CheckInQr/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $lang . '"
                                                                                style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                target="_blank"
                                                                                onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Check In</a>
                                                                                </p>

                                                                                <p style="text-align:center"><a
                                                                                        href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                        target="_blank"><img
                                                                                            src="' . asset('card-images') . '/' . $event->id_event . '.png"
                                                                                            border="0" style="margin-bottom:20px;max-width:100%"
                                                                                            class="CToWUd" data-bit="iit"></a>
                                                                                </p>
                                                                                ';
                        if ($event->type == "CORPORATE") {
                            if ($guestTable !== null) {
                                $body .= '<p style="font-style:italic;font-size:13px;text-align:center">Table: ' . $guestTable->name . ' ' . 'Seat: ' . $guestTable->guest_number . '</p> <br />';
                            } else {
                                // Handle the case where $guestTable is null
                            }
                        }
                        $body .= '
                                                                                <p style="font-style:italic;font-size:13px;text-align:center">
                                                                                    This email is personalized for you. Please do not forward.</p> <br />
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
                    } else {
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
                                                                                <a href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                target="_blank"
                                                                                onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Open
                                                                                Invitation</a>
                                                                                </p>
                                                                                <p style="text-align:center">
                                                                                <a href="' . env('APP_URL') .'/CheckInQr/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $lang . '"
                                                                                style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                target="_blank"
                                                                                onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Check In</a>
                                                                                </p>
                                                                                <p style="text-align:center"><a
                                                                                        href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                        target="_blank"><img
                                                                                            src="' . asset('card-images') . '/' . $event->id_event . '.png"
                                                                                            border="0" style="margin-bottom:20px;max-width:100%"
                                                                                            class="CToWUd" data-bit="iit"></a>
                                                                                </p>
                                                                                ';
                        if ($event->type == "CORPORATE") {
                            if ($guestTable !== null) {
                                $body .= '<p style="font-style:italic;font-size:13px;text-align:center">Table: ' . $guestTable->name . ' ' . 'Seat: ' . $guestTable->guest_number . '</p> <br />';
                            } else {
                                // Handle the case where $guestTable is null
                            }
                        }
                        $body .= '
                                                                                <p style="font-style:italic;font-size:13px;text-align:center">
                                                                                    This email is personalized for you. Please do not forward.</p> <br />
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
                    }
                } elseif ($lang == 'fr') {

                    if ($event->type == "CORPORATE") {
                        $body = '<!DOCTYPE html>
                            <html lang="fr">
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
                                                                                        ' . $cardId['msgTitle'] . '</p>
                                                                                    <p style="font-size:14px;text-align:center">' . $formattedDate . '</p>
                                                                                    <p style="margin-top:20px"></p>
                                                                                    <p style="text-align:center">
                                                                                    <a href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                    style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                    target="_blank"
                                                                                    onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                    onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Ouvrir
                                                                                    Invitation</a>
                                                                                    </p>
                                                                                    </p>
                                                                                <p style="text-align:center">
                                                                                <a href="' . env('APP_URL') .'/CheckInQr/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $lang . '"
                                                                                style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                target="_blank"
                                                                                onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Enregistrement</a>
                                                                                </p>
                                                                                    <p style="text-align:center"><a
                                                                                            href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                            target="_blank"><img
                                                                                                src="' . asset('card-images') . '/' . $event->id_event . '.png"
                                                                                                border="0" style="margin-bottom:20px;max-width:100%"
                                                                                                class="CToWUd" data-bit="iit"></a>
                                                                                    </p>
                                                                                    ';
                        if ($event->type == "CORPORATE") {
                            $body .= '<p style="font-style:italic;font-size:13px;text-align:center">Tableau: ' . ($guestTable->name ?? "-") . ' ' . 'Siège: ' . ($guestTable->guest_number ?? "-") . '</p> <br />';
                        }
                        $body .= '
                                                                                    <p style="font-style:italic;font-size:13px;text-align:center">
                                                                                        Cet e-mail est personnalisé pour vous. Merci de ne pas transmettre.</p> <br />
                                                                                    <table width="100%" cellpadding="0" cellspacing="0"
                                                                                        style="margin:0 auto;text-align:center;border-top:1px solid #ebe9e9;background:#383838;font-size:14px;color:white;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <p style="font-weight:bold;margin:15px 5px 5px 5px">Réception</p>
                                                                                                    <p style="margin:5px">' . $event->recaddress . ', ' . $event->reccity . ', ' . $event->reccountry . ', ' . $event->recprovince . ', ' . $event->recpc . '<a
                                                                                                            href="' . $event->recAddressLink . '"
                                                                                                            style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                                            target="_blank"
                                                                                                            data-saferedirecturl="' . $event->recAddressLink . '">(Voir la carte)</a></p>
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
                                                                                                <td valign="top" style="color:#ffffff">Alimenté par &nbsp;&nbsp;&nbsp;<img
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
                                                                                    Copyright © 2024 ClickInvitation. Tous droits réservés.<br>
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
                    } else {

                        $body = '<!DOCTYPE html>
                            <html lang="fr">
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
                                                                                    ' . $event->groomfname . ' &amp; ' . $event->bridefname . ' vous a envoyé une invitation pour</p>
                                                                                <p style="font-size:24px;color:#333333;text-align:center">
                                                                                    Mariage de ' . $event->groomfname . ' &amp; ' . $event->bridefname . '</p>
                                                                                <p style="font-size:14px;text-align:center">' . $formattedDate . '</p>
                                                                                <p style="margin-top:20px"></p>
                                                                                <p style="text-align:center">
                                                                                <a href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                target="_blank"
                                                                                onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Ouvrir
                                                                                Invitation</a>
                                                                                </p>
                                                                                <p style="text-align:center">
                                                                                <a href="' . env('APP_URL') .'/CheckInQr/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $lang . '"
                                                                                style="text-decoration:none;background-color:#242424;border-radius:5px;color:#ffffff;font-size:14px;padding:12px 30px;margin-bottom:10px;display:inline-block;text-transform:uppercase;white-space:nowrap"
                                                                                target="_blank"
                                                                                onmouseover="this.style.backgroundColor=\'#333333\'; this.style.boxShadow=\'0 0 5px rgba(0, 0, 0, 0.5)\';"
                                                                                onmouseout="this.style.backgroundColor=\'#242424\'; this.style.boxShadow=\'none\';">Enregistrement</a>
                                                                                </p>
                                                                                <p style="text-align:center"><a
                                                                                        href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '"
                                                                                        target="_blank"><img
                                                                                            src="' . asset('card-images') . '/' . $event->id_event . '.png"
                                                                                            border="0" style="margin-bottom:20px;max-width:100%"
                                                                                            class="CToWUd" data-bit="iit"></a>
                                                                                </p>
                                                                                ';
                        if ($event->type == "CORPORATE") {
                            $body .= '<p style="font-style:italic;font-size:13px;text-align:center">Tableau: ' . ($guestTable->name ?? "-") . ' ' . 'Siège: ' . ($guestTable->guest_number ?? "-") . '</p> <br />';
                        }
                        $body .= '
                                                                                <p style="font-style:italic;font-size:13px;text-align:center">
                                                                                    Cet e-mail est personnalisé pour vous. Merci de ne pas transmettre.</p> <br />
                                                                                <table width="70%" cellpadding="0" cellspacing="0"
                                                                                    style="margin:0 auto;text-align:center;margin-bottom:10px;border-top:1px solid #ebe9e9;font-size:14px;color:#777777">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p style="font-weight:bold;margin:15px 5px 5px 5px">
                                                                                                    Cérémonie</p>
                                                                                                <p style="margin:5px">' . $event->ceraddress . ', ' . $event->cercity . ', ' . $event->cercountry . ', ' . $event->cerprovince . ', ' . $event->cerpc . '<a
                                                                                                        href="' . $event->cerAddressLink . '"
                                                                                                        style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                                        target="_blank"
                                                                                                        data-saferedirecturl="' . $event->cerAddressLink . '">(Voir la carte)</a></p>
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
                                                                                                <p style="font-weight:bold;margin:15px 5px 5px 5px">Réception</p>
                                                                                                <p style="margin:5px">' . $event->recaddress . ', ' . $event->reccity . ', ' . $event->reccountry . ', ' . $event->recprovince . ', ' . $event->recpc . '<a
                                                                                                        href="' . $event->recAddressLink . '"
                                                                                                        style="margin-left:5px;color:#2bb573;text-decoration:none"
                                                                                                        target="_blank"
                                                                                                        data-saferedirecturl="' . $event->recAddressLink . '">(Voir la carte)</a></p>
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
                                                                                            <td valign="top" style="color:#ffffff">Alimenté par &nbsp;&nbsp;&nbsp;<img
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
                                                                                Copyright © 2024 ClickInvitation. Tous droits réservés.<br>
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
                    }
                }

                // echo $body . " - " . $guest['email'] . " - " . $event->name . " - " . $cardId['msgTitle'];
                try {
                    Mail::raw([], function ($message) use ($body, $guest, $event, $cardId) {
                        $message->from('clickinvitation@searchmarketingservices.co');
                        $message->to($guest['email']);
                        if (strlen($cardId['msgTitle']) > 0) {
                            $message->subject($cardId['msgTitle']);
                        } else {
                            $message->subject($event->name . ' Invitation');
                        }

                        $message->setBody($body, 'text/html');
                    });
                } catch (\Exception $e) {
                    echo 'Error: ' . $e->getMessage();
                    Log::error('Mail sending failed: ' . $e->getMessage());
                }
            }







            //---------- SMS ----------------------
            if ($request->has('sms') && $request->sms != 0 && $guest['phone'] && $guest['parent_id_guest'] == 0) {
                if ($event->type == "CORPORATE") {
                    if ($lang == 'en') {
                        $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                    } elseif ($lang == 'fr') {
                        $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'Vous avez une invitation pour' . $event->name . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                    } else {
                        $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                    }
                } else {

                    if ($lang == 'en') {
                        $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                    } elseif ($lang == 'fr') {
                        $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'Vous avez une invitation pour' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                    } else {
                        $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                    }
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

                //return $data;


                //return 'ok';



                /*$client = new \Goutte\Client(\Symfony\Component\HttpClient\HttpClient::create(['timeout' => 60]));

                $queryParams = [
                    'foo=1',
                    'bar=2',
                    'bar=3',
                    'baz=4',
                ];

                $content = implode('&', $queryParams);

                $crawler = $client->request('POST', 'https://api.twilio.com/2010-04-01/Accounts/ACe58142d20bb65d447e449ce1169014fe/Messages.json',
                    array(
                        'MessagingServiceSid' => 'MG3285904c6c26862be5b4a38164177db8',
                        'To' => '+393334850264',
                        'Body' => 'hi thereeee'
                    )
                );

                print_r($client->getResponse());*/
            }













            //---------- WHATSAPP ----------------------
            if ($request->has('whatsapp') && $request->whatsapp != 0 && $guest['parent_id_guest'] == 0) {
                $url = "https://graph.facebook.com/v16.0/112950588286835/messages";

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer EAAJNk9TfhxABAKCjktSgOtjFlLLlQXjsRzZAkNms6Pok0XFXMPC1GehQldqhs8cacWAHrzGjH3WX6KzJHNRBAg5Ely4VIsZAkG9OIRLVqCp9S8QUmIGJCTj2vDLZBbVOwYheZBYwcm5yD7qHzAaRNDn9ZBvbeapp1LDYfvesd4biIv58YTzub', 'Content-Type: application/json'));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $data3 = [

                    "type" => "body",
                    "parameters" => [
                        "type" => "text",
                        "text" => "Mr Jibran"
                    ]
                ];

                $data2 = [
                    "name" => "sample_issue_resolution",
                    "language" => ["code" => "en_US"],
                    "components" => $data3
                ];

                /*
                components:{
                type:body,
                parameters {
                    type:text,
                    text:Mr Jibran
                }}"

                */

                $data = array(
                    "messaging_product" => "whatsapp",
                    "to" => $guest['whatsapp'],
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
                                        "text" => 'https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang
                                    ],
                                    [
                                        "type" => "text",
                                        "text" => $cardId['msgTitle'] . " "
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

                echo $resp;
            }
        }
    }
}
