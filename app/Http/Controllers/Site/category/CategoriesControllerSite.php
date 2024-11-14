<?php

namespace App\Http\Controllers\site\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesControllerSite extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('web.site.pages.categories.index');

    }
}
