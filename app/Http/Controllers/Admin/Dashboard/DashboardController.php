<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Article;
use App\Models\Author;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request to display dashboard statistics.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $users = User::count();
        $messages = Contact::count();
        $articles = Article::count();
        $authors = Author::count();
        return view('Admin.Dashboard.index', compact('users', 'messages', 'articles', 'authors'));
    }
}
