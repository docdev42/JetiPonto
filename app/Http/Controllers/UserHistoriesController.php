<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Date;

class UserHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {      
        if($user == Auth::user())
        {            
            $history = $user->histories;
            $lastday = $history->last();
            $today= Carbon::Today();
              
            if($lastday->date != $today)
            {             
                if(Carbon::Now()->format('H') < 12)
                {   
                    $attributes = [
                        'user_id' => $user->id,
                        'date' => Carbon::Today(),
                        'entramanha' => Carbon::Now()
                    ];
                }
                elseif(Carbon::Now()->format('H') >= 12)
                {
                    $attributes = [
                        'user_id' => $user->id,
                        'date' => Carbon::Today(),
                        'entratarde' => Carbon::Now()
                    ];
                }
                $user->addHistory($attributes);
                                
            }
            elseif($lastday->saimanha == null && Carbon::Now()->format('H') <= 13)
            {                
                $lastday->saimanha = Carbon::Now();
                $lastday->save();
            }
            elseif($lastday->entratarde == null && Carbon::Now()->format('H') >= 12 && Carbon::Now()->format('H') <=16)
            {
                $lastday->entratarde = Carbon::Now();
                $lastday->save();
            }
            elseif($lastday->saitarde == null && Carbon::Now()->format('H') >= 12)
            {
                $lastday->saitarde = Carbon::Now();
                $lastday->save();
            }
        }             
                  
       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {   

        $user=User::findOrFail($id);
        $histories = $user->histories;
        $date = Carbon::Today()->toDateString();
        
             
                
        if(Auth::user()->admin == true){

            return view('historico', compact('user','histories','date'));

        }
        else
        {
            return redirect('/');

        }
    }

    public function daily($date)
    {
        
        $histories=History::where('date', $date)->get();
        $users = User::orderBy('name')->get();

        if(Auth::user()->admin == true){
            return view('daily', compact('histories','users','date'));
        }
        else
        {
            return redirect('/');

        }
    }
  
}
