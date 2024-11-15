<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Search\SearchRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest('updated_at')->paginate(12);
        return view('Admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('Admin.article.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles/', 'public');
        }
        Article::create($data);
        return redirect()->route('Admin.article.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->incrementViews();
        return view('Admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('Admin.article.edit', compact('article', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteArticleImage($article);

            $data['image'] = $request->file('image')->store('articles/', 'public');
        }
        $article->update($data);
        return redirect()->route('Admin.article.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('Admin.article.index')->with('success', 'Article deleted successfully');
    }

    protected function deleteArticleImage(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
    }


    public function search(SearchRequest $request)
    {
        $search = $request->validated()['search'];
        $articles = Article::where('title', 'like', '%' . $search . '%')->latest('updated_at')->paginate(12);
        return view('Admin.article.index', compact('articles'));
    }
}
