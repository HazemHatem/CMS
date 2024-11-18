<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Admin.Auth.login');
    }

    /**
     * Handle admin authentication.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if ($this->authorizeAccess()) {
                return redirect()->intended('/Admin');
            }

            $this->performLogout($request);
            return back()->withErrors([
                'email' => 'You do not have permission to access this section.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect',
        ])->onlyInput('email');
    }

    /**
     * Log out the authenticated admin user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->performLogout(request());
        return redirect()->route('Admin.login.index')
            ->with('success', 'You have been logged out successfully.');
    }

    /**
     * Perform logout logic, invalidating the session and regenerating the token.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    protected function performLogout($request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    /**
     * Authorize access for admin or manager roles.
     *
     * @return bool
     */
    protected function authorizeAccess()
    {
        return Gate::forUser(Auth::guard('admin')->user())->allows('admin') || Gate::forUser(Auth::guard('admin')->user())->allows('manager');
    }
}
