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

            $lang = App::getLocale();
            if ($request->has('email') && $request->email != 0 && $guest['email']) {


                if ($lang == 'en') {


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
                                        <td><img moz-do-not-send="false" src="https://clickinvitation.com//assets/images/logo/logoNewGolden.png" alt="Event masterplan" height="32"></td>

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
                                        You Got Invitation For 
                                       
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
                                        
                                        <a href="' . env('APP_URL') . 'cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '" style="
                                            background: #8f6e0b;
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
                                        ">Click here to see invitation</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="text-align: center;font-size: 1.2em;color: #ff9900;font-weight: 700;font-family: cursive;">Reception Venue: ' . $event->recaddress . '</p>
                                            <p style="text-align: center;font-size: 1.2em;color: #ff9900;font-weight: 700;font-family: cursive;">Ceremony Venue: ' . $event->ceraddress . '</p>    
                                            <p style="text-align: center;font-size: 1.2em;color: #ff9900;font-weight: 700;font-family: cursive;">Event Venue: ' . $event->paraddress . '</p>    

                                        </td>
                                    </tr>
                                </table>
                                <table width="100%"  cellpadding="20"  style="background:#8f6e0b; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
                                    <tr>                   
                                        <td>
                                            <p> This is an automated message please do not reply.<br>
                                                Clickinvitation.com' . date('Y') . '. All rights reserved.<br>
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
                                        
                                        <a href="https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guest['name'] . '/' . $lang . '" style="
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
                                    ">Accédez  a L\'invitation</a>                            
                                        </td>
                                    </tr>
                                    
                                </table>


                                <table width="100%"  cellpadding="20"  style="background:#663399; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
                                    <tr>                   
                                        <td>
                                            <p> This is an automated message please do not reply.<br>
                                                Clickinvitation.com' . date('Y') . '. All rights reserved.<br>
                                                <a style="color:white;"  href="mailto:info@clickinvitation.com">info@clickinvitation.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                if ($lang == 'en') {
                    $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                } elseif ($lang == 'fr') {
                    $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'Vous avez une invitation pour' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
                } else {
                    $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] . "\n\n" . 'You Got Invitation For ' . $event->name . ' ' . $event->type . ' https://clickinvitation.com/cardInvitations/' . $cardId['id_card'] . '/' . $guest['code'] . '/' . $guestName . '/' . $lang];
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
                )
                ;



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