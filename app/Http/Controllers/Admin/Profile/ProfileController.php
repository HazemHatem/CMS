<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\changePasswordRequest;
use App\Http\Requests\Admin\User\UserRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Display the specified user's profile.
     *
     * @param \App\Models\User $user The user whose profile is to be displayed.
     * @return \Illuminate\View\View The view displaying the user's profile.
     */
    public function show(User $user)
    {
        return view('Admin.Profile.show', compact('user'));
    }



    /**
     * Update the specified user's profile.
     *
     * @param \App\Http\Requests\Admin\User\UserRequest $request The request containing the new profile information.
     * @param \App\Models\User $user The user whose profile is to be updated.
     * @return \Illuminate\Http\RedirectResponse A redirect response back to the previous page with a success message.
     */
    public function update(UserRequest $request, User $profile)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteUserImage($profile);
            $data['image'] = $request->file('image')->store('users/', 'public');
        }
        $profile->update($data);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    /**
     * Change the password for the specified user.
     *
     * @param \App\Http\Requests\Admin\changePasswordRequest $request The request containing the new password.
     * @param \App\Models\User $user The user whose password is to be changed.
     * @return \Illuminate\Http\RedirectResponse A redirect response back to the previous page with a success message.
     */
    public function changePassword(changePasswordRequest $request, User $profile)
    {
        $profile->update(['password' => Hash::make($request->validated('password'))]);
        return redirect()->back()->with('success', 'Password updated successfully');
    }


    protected function deleteUserImage(User $profile)
    {
        if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }
    }
}
