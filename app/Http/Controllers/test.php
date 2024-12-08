<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Article\ArticleRequest;
use App\Models\Article;
use Auth;
use Illuminate\Http\Request;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArticleRequest $request)
    {
        dd('$request->all()');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
   dd($data);
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
