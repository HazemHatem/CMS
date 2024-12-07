<?php

namespace App\Http\Controllers\Site\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Site\Profile\ProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Site\Profile\changePasswordRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web.site.pages.profile.index');
    }

    public function update(ProfileRequest $request, User $profile)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteUserImage($profile);
            $data['image'] = $request->file('image')->store('users/', 'public');
        }
        $profile->update($data);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function deleteUserImage(User $profile)
    {
        if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }
    }

    public function changePassword(changePasswordRequest $request, User $profile)
    {
        $profile->update($request->validated());
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
