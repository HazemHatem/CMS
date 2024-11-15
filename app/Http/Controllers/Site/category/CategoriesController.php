<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        return view('web.site.pages.categories.index', compact('categories'));
    }
}
