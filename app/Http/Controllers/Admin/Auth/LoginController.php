<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{

    /**
     * Display the login view for the admin area.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Admin.Auth.login');
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * This method attempts to authenticate an admin user using the provided email and password.
     * If successful, it regenerates the session and redirects the user to their intended destination, which is the admin dashboard.
     * If the authentication fails, or the user does not have the necessary permissions, it redirects back with an error message, retaining the email input.
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if (Gate::allows('admin') || Gate::allows('manager')) {
                return redirect()->intended('/Admin');
            }
            Auth::guard()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return back()->withErrors([
                'email' => 'You do not have permission to access this section.',
            ])->onlyInput('email');
        }
        return back()->withErrors([
            'email' => 'Email or password is incorrect',
        ])->onlyInput('email');
    }


    /**
     * Log out the authenticated admin user, invalidate the session,
     * regenerate the session token, and redirect to the admin login page
     * with a success message.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('Admin.login.index')->with('success', 'You have been logged out successfully.');
    }
}
