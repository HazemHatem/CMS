<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\Category\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Search\SearchRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('updated_at')->paginate(10);
        return view('Admin.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories/', 'public');
        }
        Category::create($data);
        return redirect()->route('Admin.category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('Admin.Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteCategoryImage($category);
            $data['image'] = $request->file('image')->store('categories/', 'public');
        }
        $category->update($data);
        return redirect()->route('Admin.category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('Admin.category.index')->with('success', 'Category deleted successfully');
    }


    public function search(SearchRequest $request)
    {
        $search = $request->validated()['search'];
        $categories = Category::where('name', 'like', '%' . $search . '%')->latest('updated_at')->paginate(10);
        return view('Admin.Category.index', compact('categories'));
    }

    public function deleteCategoryImage(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
    }
}
