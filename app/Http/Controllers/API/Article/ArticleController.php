<?php

namespace App\Http\Controllers\API\Article;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\API\Article\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $articles = Article::all();
        return response()->json([
            'success' => true,
            'articles' => $articles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        $article = Article::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Article created successfully',
            'article' => $article
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): JsonResponse
    {
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $article->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Article updated successfully',
            'article' => $article
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): JsonResponse
    {
        $article->delete();
        return response()->json([
            'success' => true,
            'message' => 'Article deleted successfully'
        ]);
    }
}
