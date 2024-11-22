<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('web.site.pages.Categories.index', compact('categories'));
    }

    public function article(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->paginate(10);
        return view('web.site.pages.article.index', compact('articles'));
    }
}
