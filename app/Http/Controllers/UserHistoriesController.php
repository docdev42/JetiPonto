<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\History;
use Illuminate\Support\Facades\Auth;

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
    public function store($id)
    {   
        
        $user = User::findOrFail($id);
        $lastday = History::latest('date')->get('date')->first();
        $today= Carbon::Today("d");
        dd($lastday);
        
            if($today != $lastday)
            {
                $attributes = [
                    'user_id' => $user->id,
                    'date' => Carbon::Today(),
                    'entramanha' => Carbon::Now()
                ];
                $user->addHistory($attributes);
            }
                  
                //History::create([
                //    'user_id' => $user->id,
                //    'date' => Carbon::Today(),
                //    'entramanha' => Carbon::Now()
                //]);
                  
       
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
