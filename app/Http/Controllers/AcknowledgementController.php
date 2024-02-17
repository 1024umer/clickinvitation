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

/*use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;*/

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

//use Goutte\Client;
//use Symfony\Component\HttpClient\HttpClient;


//{{env('APP_URL')}}

class AcknowledgementController extends Controller
{




    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function sendacknowledgementemail(Request $request)
    {
        foreach ($request->guests as $guest) {
            if (isset($guest['emailselected']) && $guest['emailselected'] == 1) {
                $event = \App\Event::where('id_event', $request->idevent)->first();
                $guestsend = \App\Guest::where('id_guest', $guest['id_guest'])->first();
                $cardId = \App\Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first()->id_card;

                $guestName = str_replace(" ", "+", $guest['name']);

                $lang = App::getLocale();
                echo $lang;
                if ($guest['email'] && $guest['parent_id_guest'] == 0) {

                    Mail::send(
                        'mails.acknowledgment',
                        [
                            'fake' => 0,
                            'guest' => $guestsend,
                            'event' => $event,
                            'cardId' => $cardId,
                            'lang' => $lang
                        ],
                        function ($message) use ($guest, $event) {
                            $message->from('info@clickinvitation.com');
                            $message->to($guest['email']);
                            $message->subject($event->name . ' Acknowledgement');
                        }
                    );
                }
            }
        }
    }




    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function sendacknowledgementsms(Request $request)
    {
        foreach ($request->guests as $guest) {
            if (isset($guest['phoneselected']) && $guest['phoneselected'] == 1) {

                $event = \App\Event::where('id_event', $request->idevent)->first();
                $guestsend = \App\Guest::where('id_guest', $guest['id_guest'])->first();
                $cardId = \App\Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first();
                $lang = App::getLocale();

                //---------- SMS ----------------------
                $params = ['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId->msgTitle . "\n\n" . "You Got a new Acknowledgement \n https://clickinvitation.com/mail-acknowledgment/" . $guest['id_guest'] . "/" . $event->id_event];
                /*}
                elseif ($lang == 'fr'){
                    $params=['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] ."\n\n". 'Vous avez une invitation pour'.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$guest['code'].'/'.$guestName.'/'.$lang];
                }else {
                    $params=['MessagingServiceSid' => 'MG1638f5c41f52b36db3469924b8ff345a', 'To' => $guest['phone'], 'Body' => $cardId['msgTitle'] ."\n\n". 'You Got Invitation For '.$event->name.' '.$event->type.' https://clickinvitation.com/cardInvitation/'.$cardId['id_card'].'/'.$guest['code'].'/'.$guestName.'/'.$lang];
                }*/
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
    }




    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function sendacknowledgementwhatsapp(Request $request)
    {
        //return $request;
        foreach ($request->guests as $guest) {
            //---------- WHATSAPP ----------------------
            if (isset($guest['whatsappselected'])) {
                if ($guest['whatsappselected'] == 1) {

                    $event = \App\Event::where('id_event', $request->idevent)->first();
                    $guestsend = \App\Guest::where('id_guest', $guest['id_guest'])->first();
                    $cardId = \App\Card::select("*")->where([['id_event', "=", $event->id_event]])->orderBy('id_card', 'desc')->first();
                    $lang = App::getLocale();
                    $guestName = str_replace(" ", "+", $guest['name']);

                    $url = "https://graph.facebook.com/v16.0/112950588286835/messages";

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization:Bearer EAAJNk9TfhxABAKCjktSgOtjFlLLlQXjsRzZAkNms6Pok0XFXMPC1GehQldqhs8cacWAHrzGjH3WX6KzJHNRBAg5Ely4VIsZAkG9OIRLVqCp9S8QUmIGJCTj2vDLZBbVOwYheZBYwcm5yD7qHzAaRNDn9ZBvbeapp1LDYfvesd4biIv58YTzub', 'Content-Type: application/json'));
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


                    $data = array(
                        "messaging_product" => "whatsapp",
                        "to" => $guest['whatsapp'],
                        "type" => "template",

                        "template" => array(
                            "name" => "acknowledgement",
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
                                            "text" => 'Link: ' . 'https://clickinvitation.com/mail-acknowledgment/' . $guest['id_guest'] . '/' . $request->idevent
                                        ],
                                        // [
                                        //     "type" => "text",
                                        //     "text" => '*Dear ' . $guest['name'] . '*,\n\nThank you for your acknowledgment. We are pleased to inform you about the following event\n\n'
                                        // ],
                                        [
                                            "type" => "text",
                                            "text" => '*CLICKINVITATION*'
                                        ],
                                    )
                                ]
                            )
                        )
                    );



                    $fields_string = json_encode($data);
                    //echo $fields_string;
                    //echo $fields_string;
                    //echo "<br/>";
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);

                    $resp = curl_exec($curl);
                    curl_close($curl);

                    //echo $resp;

                    //return $guest;
                }
            }
        }
        return $request;
    }
}
