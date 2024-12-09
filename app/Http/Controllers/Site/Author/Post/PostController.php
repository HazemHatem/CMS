<?php

namespace App\Http\Controllers\Site\Author\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\Site\Article\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::latest('updated_at')
            ->where('author_id', auth()->user()->id)
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('web.site.pages.author.post.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('web.site.pages.author.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = Auth::user()->id;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        Article::create($data);
        return redirect()->route('Author.post.index')->with('success', 'Article created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $post)
    {
        $categories = Category::all();
        $article = $post;
        return view('web.site.pages.author.post.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $post)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteArticleImage($post);
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        $post->update($data);
        return redirect()->route('Author.post.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $post)
    {
        $this->deleteArticleImage($post);
        $post->delete();
        return redirect()->route('Author.post.index')->with('success', 'Article deleted successfully');
    }

    protected function deleteArticleImage(Article $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
    }
}
