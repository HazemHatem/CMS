<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Http\Requests\Admin\Author\AuthorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::latest('updated_at')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(12)
            ->appends($request->all());
        return view('Admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('authors/', 'public');
        }
        Author::create($data);
        return redirect()->route('Admin.author.index')->with('success', 'Author created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('Admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('Admin.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteAuthorImage($author);
            $data['image'] = $request->file('image')->store('authors/', 'public');
        }
        $author->update($data);
        return redirect()->route('Admin.author.index')->with('success', 'Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('Admin.author.index')->with('success', 'Author deleted successfully');
    }

    protected function deleteAuthorImage(Author $author)
    {
        if ($author->image) {
            Storage::disk('public')->delete($author->image);
        }
    }
}
