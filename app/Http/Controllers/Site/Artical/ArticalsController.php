<?php

namespace App\Http\Controllers\site\Artical;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticalsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $Article = Article::all();
        // return view('web.site.pages.home.index',compact('Articles'));
    }
}
