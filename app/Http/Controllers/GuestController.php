<?php

namespace App\Http\Controllers;

use Auth;
use Dompdf\Adapter\GD;
use App\Mail\GuestAttending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use phpqrcode\qrlib;



class GuestController extends Controller
{
    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function newguest(Request $request)
    {
        $count = \App\Guest::where('parent_id_guest', $request->parentidguest)->count();
        $allowed = \App\Guest::where('id_guest', $request->parentidguest)->first();
        if ($allowed) {

            if ($count < $allowed->members_number) {
                $guest = new \App\Guest;
                $guest->name = $request->nameguest;
                if ($request->has('emailguest'))
                    $guest->email = $request->emailguest;
                if ($request->has('phoneguest'))
                    $guest->phone = $request->phoneguest;
                if ($request->has('whatsappguest'))
                    $guest->whatsapp = $request->whatsappguest;
                $guest->mainguest = $request->mainguest;
                $guest->parent_id_guest = $request->parentidguest;
                $guest->id_event = $request->idevent;
                $guest->allergies = $request->allergiesguest ? 1 : 0;
                if ($request->has('idmealguest')) {
                    $guest->id_meal = $request->idmealguest;
                    $guest->opened = 2;
                }
                if ($request->confirmGuest && $request->confirmGuest == 1) {
                    $guest->opened = 2;
                }
                if ($request->mainguest == 1) {
                    $guest->opened = null;
                } else {
                    $guest->opened = 2;
                }
                $guest->members_number = $request->membernumberguest;
                if ($request->has('notesguest'))
                    $guest->notes = $request->notesguest;
                $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);

                $guest->save();
            } else {
                return response()->json(['error' => 'Max number of guests reached']);
            }
        } else {
            $guest = new \App\Guest;
            $guest->name = $request->nameguest;
            if ($request->has('emailguest'))
                $guest->email = $request->emailguest;
            if ($request->has('phoneguest'))
                $guest->phone = $request->phoneguest;
            if ($request->has('whatsappguest'))
                $guest->whatsapp = $request->whatsappguest;
            $guest->mainguest = $request->mainguest;
            $guest->parent_id_guest = $request->parentidguest;
            $guest->id_event = $request->idevent;
            $guest->allergies = $request->allergiesguest ? 1 : 0;
            $guest->opened = null;
            if ($request->has('idmealguest')) {
                $guest->id_meal = $request->idmealguest;
                $guest->opened = 2;
            }
            if ($request->confirmGuest && $request->confirmGuest == 1) {
                $guest->opened = 2;
            }
            $guest->members_number = $request->membernumberguest;
            if ($request->has('notesguest'))
                $guest->notes = $request->notesguest;
            $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);

            $guest->save();
        }
        if ($request->parentidguest != "") {
            $GuestEmail = \App\Guest::where('id_guest', $request->parentidguest)->first();
            $meal = \App\Meal::where('id_meal', $guest->id_meal)->first();
            $event = \App\Event::where('id_event', $request->idevent)->first();
            if ($GuestEmail && $GuestEmail->email) {
                Mail::to($GuestEmail->email)->send(new GuestAttending($guest, $event, $meal));
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
    public function showguests(Request $request)
    {
        $guests = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 1)->get();
        foreach ($guests as $g) {
            $g->members = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();
            foreach ($g->members as $gm) {
                if ($gm->id_meal != 0)
                    $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
            }
            foreach ($g->members as $gm) {
                if ($gm->id_table != 0)
                    $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
            }
        }
        foreach ($guests as $g) {
            if ($g->id_meal != 0)
                $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
        }
        foreach ($guests as $g) {
            if ($g->id_table != 0)
                $g->table = \App\Table::where('id_table', $g->id_table)->first();
        }
        return $guests;
    }
    public function getguestsqr($id)
    {
        $guests = \App\Guest::where('id_event', $id)->where('mainguest', 1)->get();
        foreach ($guests as $g) {
            $cardId = \App\Card::where('id_event', $id)->first();
            $guest_code = $g->code;
            $guest_name = $g->name;
            $lang = Session('applocale');
            if($lang == "en"){
                $url = url('/cardInvitations/' . $cardId->id_card . '/' . $guest_code . '/' . $guest_name . '/' . 'en');
            }else if ($lang == "fr"){
                $url = url('/cardInvitations/' . $cardId->id_card . '/' . $guest_code . '/' . $guest_name . '/' . 'fr');
            }else{
                $url = url('/cardInvitations/' . $cardId->id_card . '/' . $guest_code . '/' . $guest_name . '/' . 'en');
            }
            require_once 'C:\xampp 7.4.1\htdocs\Clickinvitation\app\Http\Controllers/phpqrcode/qrlib.php';
            // require_once '/var/www/html/clickinvitation/app/Http/Controllers/phpqrcode/qrlib.php';
            
            $path = 'images/';
            $qrcode = $path . $g->id_guest.$guest_code . '.png';
            if (!file_exists($qrcode)) {
                \QRcode::png($url, $qrcode, 'H', 4, 4);
            };
            if (file_exists($qrcode)) {
                $QrCodeImage = base64_encode(file_get_contents($qrcode));
                $g->QrCodeImage = $QrCodeImage; // Include QR code image as base64 string
                $g->QrCodeImagePath = url('/images/' . $g->id_guest . $guest_code . '.png');
            } else {
                $g->QrCodeImage = null;
                $g->QrCodeImagePath = null;
            }
        }
        return \Barryvdh\DomPDF\Facade::loadView('qrPdf',['guests' => $guests] )->stream('tables.pdf');
        // return view('qrPdf')->with('guests',$guests);
        // return $guests;
    }


    public function showguestsDeclined(Request $request)
    {
        $guests = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 1)->get();
        $isDeclined = 0;
        foreach ($guests as $g) {
            $g->members = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();

            $isDeclined = $g->declined;

            foreach ($g->members as $gm) {
                if ($gm->declined == 1) {
                    $isDeclined = 1;
                }
                if ($gm->id_meal != 0)
                    $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
            }
            foreach ($g->members as $gm) {
                if ($gm->id_table != 0)
                    $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
            }
            $g->isDeclined = $isDeclined;
        }
        foreach ($guests as $g) {
            if ($g->id_meal != 0)
                $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
        }
        foreach ($guests as $g) {
            if ($g->id_table != 0)
                $g->table = \App\Table::where('id_table', $g->id_table)->first();
        }
        return $guests;
    }
    public function showguestsCheckedIn(Request $request)
    {
        $guests = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 1)->get();
        $CheckedIn = 0;
        foreach ($guests as $g) {
            $g->members = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();

            $CheckedIn = $g->checkin;

            foreach ($g->members as $gm) {
                if ($gm->checkin == 1) {
                    $CheckedIn = 1;
                }
                if ($gm->id_meal != 0)
                    $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
            }
            foreach ($g->members as $gm) {
                if ($gm->id_table != 0)
                    $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
            }
            $g->CheckedIn = $CheckedIn;
        }
        foreach ($guests as $g) {
            if ($g->id_meal != 0)
                $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
        }
        foreach ($guests as $g) {
            if ($g->id_table != 0)
                $g->table = \App\Table::where('id_table', $g->id_table)->first();
        }
        return $guests;
    }
    // public function showguestsAttending(Request $request)
    // {
    //     $guests = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 1)->whereNull('checkin')->get();
    //     $isDeclined = 0;
    //     $CheckedIn = 0;
    //     $attending = 0;
    //     foreach ($guests as $g) {
    //         $g->members = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->where('opened', 2)->whereNull('checkin')->get();

    //         $CheckedIn = $g->declined;
    //         $isDeclined = $g->checkin;
    //         if ($g->declined != 1 && $g->checkin != 1) {
    //             $attending = 1;
    //         }

    //         foreach ($g->members as $gm) {
    //             if ($gm->declined != 1 && $gm->checkin != 1) {
    //                 $attending = 1;
    //             } else {
    //                 $attending = 0;
    //             }

    //             if ($gm->id_meal != 0)
    //                 $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
    //         }
    //         foreach ($g->members as $gm) {
    //             if ($gm->id_table != 0)
    //                 $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
    //         }
    //         $g->isDeclined = $isDeclined;
    //         $g->CheckedIn = $CheckedIn;
    //         $g->Attending = $attending;
    //     }
    //     foreach ($guests as $g) {
    //         if ($g->id_meal != 0)
    //             $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
    //     }
    //     foreach ($guests as $g) {
    //         if ($g->id_table != 0)
    //             $g->table = \App\Table::where('id_table', $g->id_table)->first();
    //     }
    //     return $guests;
    // }

    public function showguestsAttending(Request $request)
    {
        $guests = \App\Guest::where('id_event', $request->idevent)
            ->where('mainguest', 1)
            ->get();
        foreach ($guests as $g) {
            // Fetch members associated with the main guest
            $g->members = \App\Guest::where('id_event', $request->idevent)
                ->where('mainguest', 0)
                ->where('parent_id_guest', $g->id_guest)
                ->get();

            // Initialize the new column
            $g->hasOpenedTwo = 0;

            if ($g->opened == 2) {
                $g->guestOpened = 1;
            } else {
                $g->guestOpened = 0;
            }

            foreach ($g->members as $gm) {
                // Check if any member's 'opened' number is equal to 2
                if ($gm->opened == 2) {
                    // If found, set the new column to true
                    $g->hasOpenedTwo = 1;
                    // Break the loop as we only need to find one member with 'opened' equal to 2
                    break;
                }
            }

            // Update properties for the main guest
            $g->isDeclined = $g->checkin;
            $g->CheckedIn = $g->declined;
            $g->Attending = $g->declined != 1 && $g->checkin != 1;
        }

        // Fetch meal and table information for each guest
        foreach ($guests as $g) {
            if ($g->id_meal != 0)
                $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
        }
        foreach ($guests as $g) {
            if ($g->id_table != 0)
                $g->table = \App\Table::where('id_table', $g->id_table)->first();
        }

        return $guests;
    }

    public function showguestsNotConfim(Request $request)
    {
        $guests = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 1)->where('declined', 1)->get();

        foreach ($guests as $g) {
            $NotConfim = 0;
            $g->members = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->where('declined', 1)->get();

            if ($g->opened != 2) {

                $g->NotConfim = 0;
            } else {
                $g->NotConfim = 1;
            }

            foreach ($g->members as $gm) {
                if ($gm->opened != 2) {

                    $gm->NotConfim = 1;
                } else {
                    $gm->NotConfim = 0;
                }

                if ($gm->id_meal != 0)
                    $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
            }


            foreach ($g->members as $gm) {
                if ($gm->id_table != 0)
                    $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
            }
        }
        foreach ($guests as $g) {
            if ($g->id_meal != 0)
                $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
        }
        foreach ($guests as $g) {
            if ($g->id_table != 0)
                $g->table = \App\Table::where('id_table', $g->id_table)->first();
        }
        return $guests;
    }

    public function showguestsNotOpen(Request $request)
    {
        $guests = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 1)->whereNull('opened')->get();

        foreach ($guests as $g) {
            $NotConfim = 0;
            $g->members = \App\Guest::where('id_event', $request->idevent)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->whereNull('opened')->get();

            if ($g->opened) {

                $g->NotConfim = 1;
            } else {
                $g->NotConfim = 0;
            }

            foreach ($g->members as $gm) {
                if ($gm->opened) {

                    $gm->NotConfim = 1;
                } else {
                    $gm->NotConfim = 0;
                }

                if ($gm->id_meal != 0)
                    $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
            }


            foreach ($g->members as $gm) {
                if ($gm->id_table != 0)
                    $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
            }
        }
        foreach ($guests as $g) {
            if ($g->id_meal != 0)
                $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
        }
        foreach ($guests as $g) {
            if ($g->id_table != 0)
                $g->table = \App\Table::where('id_table', $g->id_table)->first();
        }
        return $guests;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function showguestsforadmin(Request $request)
    {
        $allevents = \App\Event::where('id_user', Auth::id())->select('id_event')->get();
        $guests = \App\Guest::whereIn('id_event', $allevents)->where('mainguest', 1)->get();
        foreach ($guests as $g) {
            $g->members = \App\Guest::whereIn('id_event', $allevents)->where('mainguest', 0)->where('parent_id_guest', $g->id_guest)->get();
            foreach ($g->members as $gm) {
                if ($gm->id_meal != 0)
                    $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
            }
            foreach ($g->members as $gm) {
                if ($gm->id_table != 0)
                    $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
            }
        }
        foreach ($guests as $g) {
            if ($g->id_meal != 0)
                $g->meal = \App\Meal::where('id_meal', $g->id_meal)->first();
        }
        foreach ($guests as $g) {
            if ($g->id_table != 0)
                $g->table = \App\Table::where('id_table', $g->id_table)->first();
        }
        return $guests;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function allguests(Request $request)
    {
        $events = \App\Event::where('id_user', Auth::id())->where('id_event', '!=', $request->idevent)->get();
        foreach ($events as $event)
            $event->guests = \App\Guest::where('id_event', $event->id_event)->where('mainguest', 1)->get();
        return $events;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function allguestsnotnested(Request $request)
    {
        // $guests = \App\Guest::where('id_event', $request->idevent)->where('opened', 2)->where('opened', '!=', 1)->where('declined', NULL)->get();

        // $guests = DB::select('SELECT * FROM guests WHERE id_event = ' . $request->idevent . ' AND 
        // ((opened = 1) OR (checkin = 1) OR (id_meal IS NOT NULL) OR (opened = 2) OR (checkin IS NULL)) AND 
        // ((opened = 2) OR (checkin = 1) OR (id_meal IS NOT NULL)) AND
        // (opened IS NOT NULL OR checkin IS NOT NULL)
        // OR ((id_meal IS NOT NULL) AND (id_event = ' . $request->idevent . ') AND (checkin = 1));');

        $guests = DB::select('
        SELECT *
            FROM guests
            WHERE (id_event = ' . $request->idevent . ') AND 
            (
                ((checkin = 1) AND declined is NULL AND ((id_meal IS NOT NULL) OR (opened = 2))) OR
                (((opened = 2) OR (id_meal IS NOT NULL)) AND (declined is NULL))
            )
        ');




        // $guests=\App\Guest::where('id_event', $request->idevent)->where('declined' , NULL)->orWhere('declined',2)->orWhere('declined',0)->get();
        foreach ($guests as $guest) {

            if ($guest->id_table != 0) {
                $table = \App\Table::where('id_table', $guest->id_table)->first();
                if ($table)
                    $guest->tablename = $table->name;
            }
            if ($guest->id_meal != null) {
                $meal = \App\Meal::where('id_meal', $guest->id_meal)->first();
                if ($meal)
                    $guest->mealName = $meal->name;
            }
        }
        return $guests;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function showopguests(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest->id_table)
            $guest->table = \App\Table::where('id_table', $guest->id_table)->first();
        if ($guest) {
            $guests = \App\Guest::where('parent_id_guest', $guest->id_guest)->get();
            foreach ($guests as $g) {
                if ($g->id_table) {
                    $g->table = \App\Table::where('id_table', $g->id_table)->first();
                }
                $seat = \App\Seat::where('id_guest', $g->id_guest)->first();
                if ($seat) {
                    // If $seat exists, assign the value to $g->seat after replacing non-numeric characters
                    $g->seat = preg_replace('/[^0-9]/', '', $seat->seat_name);
                } else {
                    // If $seat does not exist, assign a default value or handle it as you prefer
                    $g->seat = 'No Seat Assigned';
                }
            }
            $GuestSeat = \App\Seat::where('id_guest', $guest->id_guest)->first();
            $guest->childs = $guests;
            $guest->seat = isset($GuestSeat->seat_name) ? preg_replace('/[^0-9]/', '', $GuestSeat->seat_name) : '';

            return $guest;
        }
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delguest(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->guestid)->first();
        if ($guest) {
            $event = \App\Event::where('id_event', $request->idevent)->first();
            if ($event && $event->id_user == Auth::id()) {
                $guests = \App\Guest::where('parent_id_guest', $request->guestid)->get();
                foreach ($guests as $gu)
                    $gu->delete();
                $guest->delete();
            } else
                return 0;
        } else
            return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delguestforadmin(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->guestid)->first();
        if ($guest) {
            $guests = \App\Guest::where('parent_id_guest', $request->guestid)->get();
            foreach ($guests as $gu)
                $gu->delete();
            $guest->delete();
        } else
            return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delmemberattending(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->guestid)->first();
        if ($guest) {
            $guest->delete();
        } else
            return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function declineguest(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->guestid)->first();
        if ($guest) {
            $event = \App\Event::where('id_event', $request->idevent)->first();
            if ($event && $event->id_user == Auth::id()) {
                $guest->declined = 1;
                $guest->opened = null;
                $guest->checkin = null;
                $guest->id_table = 0;
                $guest->save();
            } else
                return 0;
        } else
            return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function undeclineguest(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->guestid)->first();
        if ($guest) {
            $event = \App\Event::where('id_event', $request->idevent)->first();
            if ($event && $event->id_user == Auth::id()) {
                $guest->declined = NULL;
                $guest->save();
            } else
                return 0;
        } else
            return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function editguest(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            $guest->name = $request->nameguest;
            $guest->email = $request->emailguest;
            $guest->phone = $request->phoneguest;
            $guest->whatsapp = $request->whatsappguest;
            $guest->allergies = $request->allergiesguest;
            if ($request->has('idmealguest')) {
                $guest->id_meal = $request->idmealguest;
            }
            if ($request->idmealguest != 0) {
                $guest->opened = 2;
            }
            if ($request->confirmGuest && ($request->confirmGuest == 1 || $request->confirmGuest == 2)) {
                $guest->opened = 2;
            }else{
                $guest->opened = null;
            }
            $guest->notes = $request->notesguest;
            if ($guest->mainguest)
                $guest->members_number = $request->membernumberguest;

            $guest->save();
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
    public function editopguest(Request $request)
    {

        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            $guest->name = $request->nameguest;
            $guest->email = $request->emailguest;
            $guest->phone = $request->phoneguest;
            $guest->whatsapp = $request->whatsappguest;
            $guest->allergies = $request->allergiesguest;
            if ($request->has('idmealguest') && $request->idmealguest != null) {
                $guest->id_meal = $request->idmealguest;
                $guest->opened = 2;
            }
            $guest->notes = $request->notesguest;
            if ($guest->mainguest)
                $guest->members_number = $request->membernumberguest;

            $guest->save();
            return 1;
        } else
            return 0;
    }

    public function confirmGuest(Request $request)
    {
        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            $guest->opened = 2;
            $guest->declined = null;
            $guest->checkin = null;
            $guest->save();
            return 1;
        }
        return 0;
    }
    public function GuestDecline(Request $request)
    {
        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            $guest->opened = null;
            $guest->declined = 1;
            $guest->checkin = null;
            $guest->save();
            return 1;
        }
        return 0;
        // if($guest){
        //     $guest->delete();
        // }
        // else return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function importfromoe(Request $request)
    {
        $allevents = $request->allguests;
        foreach ($allevents as $ievent) {
            if ($ievent['guests'] != []) {
                foreach ($ievent['guests'] as $iguest) {
                    if (array_key_exists('selected', $iguest) && $iguest['selected'] == 1) {
                        $guest = new \App\Guest;
                        $guest->name = $iguest['name'];
                        $guest->phone = $iguest['phone'];
                        $guest->whatsapp = $iguest['whatsapp'];
                        $guest->email = $iguest['email'];
                        $guest->id_event = $request['idevent'];
                        $guest->allergies = $iguest['allergies'];
                        $guest->mainguest = 1;
                        $guest->parent_id_guest = 0;
                        $guest->members_number = $iguest['members_number'];
                        $guest->notes = $iguest['notes'];
                        $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
                        $guest->save();
                    }
                }
            }
        }
        return $allevents;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function importfromcsv(Request $request)
    {
        foreach ($request->guests as $g) {
            $guest = new \App\Guest;
            $guest->name = $g['name'];
            $guest->email = $g['email'];
            $guest->phone = $g['phone'];
            $guest->whatsapp = $g['whatsapp'];
            $guest->mainguest = 1;
            $guest->parent_id_guest = 0;
            $guest->notes = $g['notes'];
            $guest->id_event = $request->idevent;
            $guest->members_number = $g['nummembers'];
            $guest->code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 20);
            $guest->save();
        }
        return $request->guests;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function changecheck(Request $request)
    {
        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            if ($guest->checkin == 1)
                $guest->checkin = 0;
            else
                $guest->checkin = 1;
            $guest->opened = null;
            $guest->save();
        }
        return 1;
    }

    public function guestcheck(Request $request)
    {


        $guest = \App\Guest::where('code', $request->guestCode)->first();
        if ($guest) {
            $guest->checkin = 1;
            $guest->save();
        }
        return redirect('https://clickinvitation.com/check-in/' . $request->cardID . '/' . $request->guestCode . '/' . $request->lang);
        //https://clickinvitation.com/check-in/{{ $card[0]->id_card }}/{{ $guestCode }}/{{ $lang or '' }}
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function mymembers(Request $request)
    {
        $members = \App\Guest::where('mainguest', 0)->where('parent_id_guest', $request->idgroup)->get();
        $total = count($members);
        foreach ($members as $gm) {
            if ($gm->id_meal != 0)
                $gm->meal = \App\Meal::where('id_meal', $gm->id_meal)->first();
        }
        foreach ($members as $gm) {
            if ($gm->id_table != 0) {
                $gm->table = \App\Table::where('id_table', $gm->id_table)->first();
                $isSeats = DB::table('seats')->where(['id_guest' => $gm->id_guest])->first();
                if ($isSeats) {
                    $gm->seat = $isSeats->seat_name;
                }
            }
            $gm->total = $total;
        }
        return $members;
    }

    public function getGuest(Request $request)
    {
        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest) {
            return $guest;
        } else
            return 0;
    }

    public function guestedit(Request $request, $id)
    {
        $guest = \App\Guest::where('id_guest', $id)->first();
        if ($guest) {
            $guest->name = $request->nameguest;
            $guest->email = $request->emailguest;
            $guest->phone = $request->phoneguest;
            $guest->whatsapp = $request->whatsappguest;
            $guest->allergies = $request->allergies == 1 ? 1 : 0;
            $guest->id_meal = $request->idmealguest;
            $guest->notes = $request->notesguest;
            if ($request->has('membersNumber')) {
                $guest->members_number = $request->membersNumber;
            }
            $guest->save();
            return 1;
        }
        return 0;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function mygroup(Request $request)
    {
        $group = \App\Guest::where('id_guest', $request->idgroup)->first();
        if ($group->id_meal != 0)
            $group->meal = \App\Meal::where('id_meal', $group->id_meal)->first();
        if ($group->id_table != 0)
            $group->table = \App\Table::where('id_table', $group->id_table)->first();
        $group->seat = DB::table('seats')->where(['id_guest' => $group->id_guest])->first();

        return $group;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function openedanswered(Request $request)
    {
        $guest = \App\Guest::where('id_guest', $request->idguest)->first();
        if ($guest->opened != 2) {
            $guest->opened = $request->opened;
            $guest->save();
        }

        return 'ok';
    }

    // public function CheckInQr($card_id, $guest_code, $lang)
    // {
    //     $url = url('/guest-checked/' . $card_id . '/' . $guest_code . '/' . $lang);
    //     $qrCodes = [];
    //     $qrCodes['simple'] = 
    //     QrCode::size(300)->generate($url);
    //     return view('QrCode',compact('qrCodes'));
    // }


    public function CheckInQr($card_id, $guest_code, $lang)
    {
        // $guest = \App\Guest::where('code',$guest_code)->first();
        // dd($guest);
        $url = url('/guest-checked/' . $card_id . '/' . $guest_code . '/' . $lang);
        return view('QrCode', compact('url', 'guest_code'));
    }
}
