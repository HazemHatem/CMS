<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Search\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Handle the incoming request to display the contacts.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */

    public function __invoke(Request $request)
    {
        $contacts = Contact::latest('updated_at')->paginate(10);
        return view('Admin.Contact.index', compact('contacts'));
    }

    public function search(SearchRequest $request)
    {
        $search = $request->validated()['search'];
        $contacts = Contact::where('name', 'like', '%' . $search . '%')->latest('updated_at')->paginate(10);
        return view('Admin.Contact.index', compact('contacts'));
    }
}
