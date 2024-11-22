<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    { $categories = Category::all();
        $articles = Article::with('author')->take(2)->get();
        $allPosts=Article::with('author')->take(6)->get();
        return view('web.site.pages.home.index',compact('categories','articles','allPosts'));
    }
}
