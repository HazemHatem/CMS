<?php

namespace App\Http\Controllers\Site\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\requests\site\Wishlist\WishlistRequest;
use App\Models\Wishlist;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->paginate(10);
        return view('web.site.pages.wishlist.index', compact('wishlist'));
    }

    public function store(WishlistRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        Wishlist::create($data);
        return redirect()->back();
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->back();
    }
}
