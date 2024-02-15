<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;


class MealController extends Controller
{
    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function newmeal(Request $request)
    {

		$meal=new \App\Meal;
		$meal->name=$request->namemeal;
		$meal->description=$request->descriptionmeal;
		$meal->id_event=$request->idevent;

		$meal->save();
		return 1;
    }


    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function showmeals(Request $request)
    {

		$meals=\App\Meal::where('id_event', $request->idevent)->get();
		return $meals;
    }

    /**
     * Effettua login.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function delmeal(Request $request)
    {

		$meal=\App\Meal::where('id_meal',$request->idmeal)->first();
        if($meal){
            $event=\App\Event::where('id_event',$meal->id_event)->first();
            if($event && $event->id_user==Auth::id()){
                $meal->delete();
                $guests=\App\Guest::where('id_meal',$request->idmeal)->get();
                foreach($guests as $g){
                    $g->id_meal='';
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
    public function editmeal(Request $request)
    {

        $meal=\App\Meal::where('id_meal',$request->idmeal)->first();
        if($meal){
            $meal->name=$request->mealname;
            $meal->description=$request->mealdescription;
 
            $meal->save();
            return 1;
        }
        else return 0;
    }
}