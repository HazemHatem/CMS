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
    {
        $categories = Category::all();

        $Most_viewed_article = Article::latest('views')->limit(2)->get();
        $articles = Article::latest('updated_at')->limit(6)->get();
        return view('web.site.pages.home.index', compact('categories', 'articles', 'Most_viewed_article'));
    }
}
