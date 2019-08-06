<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\History;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin');       
    }

    public function index()
    {
        $date = Carbon::Today()->toDateString();
        $users = User::orderBy('name')->get();
        //dd($users);       
        return view('dashboard', compact('users','date'));
    }
 

    public function code(User $user)
    {        
        $user = User::all();
        return view('qrcode', compact('user'));
    }    
   

    public function show($id)
    {        
        $date = Carbon::Today()->toDateString();
        $user=User::findOrFail($id);
        return view('show', compact('user','date'));
    }  

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return redirect('/admin');
        
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $user->update(request()->validate([
            'name'=>'required',
            'email'=>'required'
            ]));       
        

        return redirect('/admin'); 
    }

        
};

