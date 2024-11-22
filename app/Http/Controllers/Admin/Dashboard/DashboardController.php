<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Article;

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
        $users = User::where('rule_id', 1)->count();
        $messages = Contact::count();
        $articles = Article::count();
        $authors = User::where('rule_id', 2)->count();
        return view('Admin.Dashboard.index', compact('users', 'messages', 'articles', 'authors'));
    }
}
