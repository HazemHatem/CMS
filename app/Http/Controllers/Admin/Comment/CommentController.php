<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use App\Models\Article;
use App\Http\Requests\Admin\Comment\CommentRequest;
use App\Http\Requests\Admin\Search\SearchRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::latest('updated_at')->paginate(12);
        return view('Admin.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $articles = Article::all();
        return view('Admin.comment.create', compact('users', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        Comment::create($request->validated());
        return redirect()->route('Admin.comment.index')->with('success', 'Comment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('Admin.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $users = User::all();
        $articles = Article::all();
        return view('Admin.comment.edit', compact('comment', 'users', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return redirect()->route('Admin.comment.index')->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('Admin.comment.index')->with('success', 'Comment deleted successfully');
    }

    public function search(SearchRequest $request)
    {
        $search = $request->validated()['search'];
        $comments = Comment::where('comment', 'like', '%' . $search . '%')->latest('updated_at')->paginate(12);
        return view('Admin.comment.index', compact('comments'));
    }
}
