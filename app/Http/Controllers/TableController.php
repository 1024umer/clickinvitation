<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;


class TableController extends Controller
{
    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function newtable(Request $request)
    {

		$table=new \App\Table;
		$table->name=$request->nametable;
		$table->number=$request->numbertable;
        $table->guest_number=$request->gnumbertable;
		$table->id_event=$request->idevent;

		$table->save();
        $insertedId = $table->id_table;

        $idEventType = DB::table('events')->where(['id_event'=> $request->idevent])->first();

        $isCorp = DB::table('event_type')->where(['id_eventtype'=> $idEventType->type_id])->first();

        if($isCorp->corporate_event){
            
            for ($i=0; $i < $request->gnumbertable; $i++) { 
                DB::insert('insert into seats (id_table, seat_name) values (?, ?)', [$insertedId, 'Seat '.($i + 1)]);
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
    public function showtables(Request $request)
    {
		$tables=\App\Table::where('id_event', $request->idevent)->get();
        foreach($tables as $t){
            // $t->guests=\App\Guest::where('id_table',$t->id_table)->where('declined','=' , NULL)->get();
            $t->guests = DB::select('SELECT guests.*, meals.name AS meal_name FROM guests LEFT JOIN meals ON guests.id_meal = meals.id_meal WHERE id_table = ? AND declined IS NULL', [$t->id_table]);
            $t->seats=DB::table('seats')->where('seats.id_table',$t->id_table)->get();
            foreach ($t->seats as $seats){
                $seats->guest = \App\Guest::where('id_guest',$seats->id_guest)->first();
                
                    if($seats->guest){
                        $seats->guest->meal=DB::table('meals')->where('id_meal',$seats->guest->id_meal)->first();
                    }
                
            }

            
        }
		return $tables;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function deltable(Request $request)
    {

		$table=\App\Table::where('id_table',$request->idtable)->first();
        if($table){
            $event=\App\Event::where('id_event',$table->id_event)->first();
            if($event && $event->id_user==Auth::id()){
              $table->delete();
              $guests=\App\Guest::where('id_table',$request->idtable)->get();
              foreach($guests as $g){
                  $g->id_table='';
                  $g->save();
              }
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
    public function edittable(Request $request)
    {

        $table=\App\Table::where('id_table',$request->idtable)->first();
        if($table){
            $table->name=$request->tablename;
            $table->number=$request->tablenumber;
            $table->guest_number=$request->tablegnumber;
 
            $table->save();

            $idEventType = DB::table('events')->where(['id_event'=> $request->idevent])->first();

            $isCorp = DB::table('event_type')->where(['id_eventtype'=> $idEventType->type_id])->first();

            if($isCorp->corporate_event){
                $seatCount = DB::table('seats')->where(['id_table' => $request->idtable])->count();
                $seats = DB::table('seats')->where(['id_table' => $request->idtable])->orderBy('id', 'desc')->get();

                if($seatCount > $request->tablegnumber){
                    //remove seats here
                    $removeCount = $seatCount - $request->tablegnumber;

                    for ($i=0; $i < $removeCount; $i++) { 
                        DB::table('seats')->where('id', $seats[$i]->id)->delete();
                    }

                }elseif($seatCount < $request->tablegnumber){
                    //add more seats here
                    $addCount = $request->tablegnumber - $seatCount;
                    $seatNewCount = $seatCount;
                    for ($i=0; $i < $addCount; $i++) { 
                        $seatNewCount++;
                        DB::insert('insert into seats (id_table, seat_name) values (?, ?)', [$request->idtable, 'Seat '.$seatNewCount]);
                        
                    }
                }
            }
            return 1;
        }
        else return 0;
    }

    public function addSeats(Request $request)
    {
        DB::insert('insert into seats (id_table, seat_name) values (?, ?)', [$request->idtable, $request->seatName]);
        return "done";
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function settables(Request $request)
    {

        $guests=\App\Guest::where('id_table',$request->idtable)->get();
        foreach($guests as $g){
            $g->id_table='';
            $g->save();
        } 
        

        foreach($request->allguests as $g){
            if(array_key_exists('selected', $g) && $g['selected']==1){
                $guest=\App\Guest::where('id_guest',$g['id_guest'])->first();
                if($guest){
                    $guest->id_table=$request->idtable;
                    $guest->save();
                }
            }
        }
        return 1;
    }

    public function getTables(Request $request){
        return DB::table('tables')->where(['id_event'=> $request->idevent])->get();

    }

    public function getSeats(Request $request){
        return DB::table('seats')->where(['id_table'=> $request->idTable, 'id_guest' => '0'])->get();

    }

    public function saveSeats(Request $request){
        //return $request;

        $guest=\App\Guest::where('id_guest',$request->idGuest)->first();
                if($guest){
                    $guest->id_table=$request->idTable;
                    $guest->save();

                    $old = DB::table('seats')->where('id_guest',$request->idGuest)->get();
                    $old2 = DB::table('seats')->where('id',$request->idSeat)->get();
                    //return $old2;
                    if(count($old2) > 0 ){
                        if($old2[0]->id_guest != 0){
                            //DB::update("update guests set id_table = 0 where id =".$old2[0]->id_guest); 
                            $guestOld=\App\Guest::where('id_guest',$old2[0]->id_guest)->first();
                            if($guestOld){
                                $guestOld->id_table=0;
                                $guestOld->save();
                            }
                        }
                        
                    }
                    if(count($old) > 0){
                        
                        DB::update("update seats set id_guest = '0' where id =".$old[0]->id);    
                        
                    }
                    
                    
                    DB::update('update seats set id_guest = '.$request->idGuest.' where id ='.$request->idSeat);

                    
                    return 1;
                }
                return 0;
    }

    public function removeGuest(Request $request){
        //return $request;
        $guest=\App\Guest::where('id_guest',$request->idGuest)->first();
        if($guest){
            $guest->id_table='0';
            $guest->save();

            DB::update("update seats set id_guest = '0' where id_guest =".$request->idGuest); 
        }
    }

    public function settablesseat(Request $request){
        //return $request;
        $guest=\App\Guest::where('id_guest',$request->guestID)->first();
                if($guest){
                    $guest->id_table=$request->idTable;
                    $guest->save();

                    $old = DB::table('seats')->where('id_guest',$request->guestID)->get();
                    $old2 = DB::table('seats')->where('id',$request->seatID)->get();
                    //return $old2;
                    if(count($old2) > 0 ){
                        if($old2[0]->id_guest != 0){
                            //DB::update("update guests set id_table = 0 where id =".$old2[0]->id_guest); 
                            $guestOld=\App\Guest::where('id_guest',$old2[0]->id_guest)->first();
                            if($guestOld){
                                $guestOld->id_table=0;
                                $guestOld->save();
                            }
                        }
                        
                    }
                    
                    if(count($old) > 0){
                        
                        DB::update("update seats set id_guest = '0' where id =".$old[0]->id);    
                    }
                    
                    
                    DB::update('update seats set id_guest = '.$request->guestID.' where id ='.$request->seatID);

                    
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
    public function print(Request $request)
    {           
        $event=\App\Event::where('id_event',$request->route('idevent'))->first();
        if($event && $event->id_user==Auth::id()){
            $tables=\App\Table::where('id_event',$request->route('idevent'))->get();
            foreach($tables as $t){
                $numallergy=0;
                $t->guests=\App\Guest::where('id_table',$t->id_table)->get();
                foreach($t->guests as $g){
                    if($g->id_meal!=0) $g->meal=\App\Meal::where('id_meal', $g->id_meal)->first();
                    if($g->allergies) $numallergy++;
                }
                $t->guestscount=\App\Guest::where('id_table',$t->id_table)->count();
                $t->numallergy=$numallergy;
                $allmeals=\App\Meal::where('id_event',$request->route('idevent'))->get();
                foreach($allmeals as $meal){
                    $ng=\App\Guest::where('id_meal',$meal->id_meal)->where('id_table',$t->id_table)->count();
                    $meal->ng=$ng;
                }
                $t->mea=$allmeals;
            }

            $totguests=\App\Guest::where('id_event',$request->route('idevent'))->where(function ($query) {
                return $query->whereNull('declined')
                      ->orwhere('declined', '=', 0);
            })->count();
            $totguestseated=\App\Guest::where('id_event',$request->route('idevent'))->where('id_table','<>',0)->count();
            $totfrees=$totguests-$totguestseated;

            $totallerseated=\App\Guest::where('id_event',$request->route('idevent'))->where('allergies',1)->where('id_table','<>',0)->count();

            $allmeals=\App\Meal::where('id_event',$request->route('idevent'))->get();
            foreach($allmeals as $meal){
                $ng=\App\Guest::where('id_meal',$meal->id_meal)->where('id_table','<>',0)->count();
                $meal->ng=$ng;
            }

            return \Barryvdh\DomPDF\Facade::loadView('pdf', ['tables' => $tables, 'event' => $event, 'totguestseated' => $totguestseated, 'totallerseated' => $totallerseated, 'allmeals' => $allmeals, 'totfrees' => $totfrees, 'totguests' => $totguests])->stream('tables.pdf'); //, compact('data')   ->save('/var/www/html/pmao/public/pdftest/pippo.pdf');
            //return view('pdf')->with('tables',$tables)->with('event',$event);
        }
        else return redirect('/');
    }
    
    
    
    public function printCard(Request $req){
        
        return \Barryvdh\DomPDF\Facade::loadView('cardPrint', ['data' => "WITH OUR FIRENDS ffd&&AND FAMILY&&HONOUR US WITH YOUR PRESENCE&&SAVE THE DATE&&First fffname&&Second name&&IN OUR WEDDING&&ONE O CLOCK IN THE AFTERNOON&&WHITE CHURCH&&YOUR CITY GOES HERE&&bg4.webp&&Card0.png&&AGENCYB&&c1baa5&&MONTEZ-REGULAR&&a0634a&&AGENCYB&&c1baa5&&AGENCYB&&c1baa5&&",])->stream('test.pdf');
    }

    public function printCard2(Request $req){

        return view('cardPrint', ['data' => $req->route('data')]);
    }


}