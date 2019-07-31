<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $users = User::all();
        return view('dashboard', compact('users'));
    }
 

    public function code(User $user)
    {        
        $user = User::all();
        return view('qrcode', compact('user'));
    }    
   

    public function show($id)
    {        
        $user=User::findOrFail($id);
        return view('show', compact('user'));
    }  

        
};

