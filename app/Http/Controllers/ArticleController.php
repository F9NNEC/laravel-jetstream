<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|url',
            'published_at' => 'nullable|date',
        ]);

        Article::create($request->all());

        return redirect()->route('admin.manage_articles')->with('success', 'Article created successfully.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|url',
            'published_at' => 'nullable|date',
        ]);

        $article->update($request->all());

        return redirect()->route('admin.manage_articles')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.manage_articles')->with('success', 'Article deleted successfully.');
    }

    public function dashboard()
    {
        $all_articles = Article::orderBy('published_at', 'desc')->get();
        $newest_articles = $all_articles->take(14);
        $older_articles = $all_articles->skip(14);
        return view('dashboard', compact('newest_articles', 'older_articles'));
    }
}
