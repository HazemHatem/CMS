<?php

namespace App\Http\Controllers\site\Controler;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;

class CategoryPost extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
     
}

    /**
     * ,compact('relatedPosts')
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $articles = Article::where('category_id', $id)->get();
         return view('web.site.pages.category.index', compact('articles'));

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
