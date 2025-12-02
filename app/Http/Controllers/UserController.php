<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
    $user = Auth::user()->role;
        if ($user === 'admin') {
            return view('admin.dashboard');
        } elseif ($user === 'user') {
            return view('user.dashboard');
        } else {
            return redirect()->back();
        }
    }
}
