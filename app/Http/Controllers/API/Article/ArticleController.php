<?php

namespace App\Http\Controllers\API\Article;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\API\Article\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        $data = $request->validated();
        $data['author_id'] = Auth::guard('api')->user()->id;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles/', 'public');
        }
        $article = Article::create($data);
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
        $article->incrementViews();
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteArticleImage($article);
            $data['image'] = $request->file('image')->store('articles/', 'public');
        }
        $article->update($data);
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

    private function deleteArticleImage(Article $article): void
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
    }
}
