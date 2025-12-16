<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
    $user = Auth::user()->role;
        $all_articles = \App\Models\Article::orderBy('published_at', 'desc')->get();
        $newest_articles = $all_articles->take(14);
        $older_articles = $all_articles->skip(14);
        if ($user === 'admin') {
            return view('dashboard', compact('newest_articles', 'older_articles'));
        } elseif ($user === 'user') {
            return view('dashboard', compact('newest_articles', 'older_articles'));
        } else {
            return redirect()->back();
        }
    }
    public function manage(){
        $articles = \App\Models\Article::orderBy('published_at', 'desc')->paginate(5);
        return view('admin.manage_articles', compact('articles'));
    }
}
