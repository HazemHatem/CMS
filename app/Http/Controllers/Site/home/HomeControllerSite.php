<?php

namespace App\Http\Controllers\site\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeControllerSite extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('web.site.pages.home.index');
  
    }
}
