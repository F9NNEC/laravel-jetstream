<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
    $user = Auth::user()->role;
        if ($user === 'admin') {
            $articles = \App\Models\Article::orderBy('published_at', 'desc')->get();
            return view('admin.dashboard', compact('articles'));
        } elseif ($user === 'user') {
            $articles = \App\Models\Article::orderBy('published_at', 'desc')->get();
            return view('user.dashboard', compact('articles'));
        } else {
            return redirect()->back();
        }
    }
    public function manage(){
        $articles = \App\Models\Article::orderBy('published_at', 'desc')->get();
        return view('admin.manage_articles', compact('articles'));
    }
}
