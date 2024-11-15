<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Requests\Admin\Admin\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Search\SearchRequest;

class AdminController extends Controller
{

    /**
     * Display a listing of the admins.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $admins = User::whereIn('role_id', [3, 4])
            ->latest('updated_at')
            ->paginate(10);
        return view('Admin.Admin.index', compact('admins'));
    }


    /**
     * Show the form for creating a new admin.
     *
     * @return \Illuminate\View\View The view displaying the create admin form.
     */
    public function create()
    {
        return view('Admin.Admin.create');
    }

    /**
     * Store a newly created admin in storage.
     *
     * @param  \App\Http\Requests\Site\Auth\RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['role_id'] = $data['role_id'] ?? 3;
        User::create($data);
        return redirect()->route('Admin.admin.index')->with('success', 'Admin created successfully');
    }

    /**
     * Show the specified admin.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $admin)
    {
        return view('Admin.Admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Contracts\View\View The view displaying the edit admin form.
     */
    public function edit(User $admin)
    {
        return view('Admin.Admin.edit', compact('admin'));
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  \App\Http\Requests\Admin\AdminRequest  $request
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, User $admin)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteAdminImage($admin);
            $data['image'] = $request->file('image')->store('admins/', 'public');
        }
        $data['role_id'] = $data['role_id'] ?? 3;
        $admin->update($data);
        return redirect()->route('Admin.admin.index')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified admin from storage.
     *
     * @param  \App\Models\User  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $admin)
    {
        $this->deleteAdminImage($admin);
        $admin->delete();
        return redirect()->route('Admin.admin.index')->with('success', 'Admin deleted successfully');
    }

    /**
     * Delete the admin's profile image from storage.
     *
     * @param \App\Models\User $admin
     * @return void
     */
    protected function deleteAdminImage(User $admin)
    {
        if ($admin->image) {
            Storage::disk('public')->delete($admin->image);
        }
    }

    public function search(SearchRequest $request)
    {
        $search = $request->validated()['search'];
        $admins = User::where('name', 'like', '%' . $search . '%')->whereIn('role_id', [3, 4])->latest('updated_at')->paginate(10);
        return view('Admin.Admin.index', compact('admins'));
    }
}
