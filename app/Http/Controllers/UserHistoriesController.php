<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

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
                $attributes = [
                    'user_id' => $user->id,
                    'date' => Carbon::Today(),
                    'entramanha' => Carbon::Now()
                ];
                $user->addHistory($attributes);
            }
            elseif($lastday->saimanha == null)
            {
                $lastday->saimanha = Carbon::Now();
                $lastday->save();
            }
            elseif($lastday->entratarde == null)
            {
                $lastday->entratarde = Carbon::Now();
                $lastday->save();
            }
            elseif($lastday->saitarde == null)
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
