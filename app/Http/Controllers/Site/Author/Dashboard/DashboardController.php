<?php

namespace App\Http\Controllers\Site\Author\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\Article\ArticleController;
use App\Http\Requests\Site\Articale\ArtisalRequest;
 
 use App\Models\Article;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web.site.pages.author.dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('web.site.pages.author.dashboard.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtisalRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = Auth::guard('admin')->user()->id;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        Article::create($data);
        return redirect()->route('Admin.article.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
