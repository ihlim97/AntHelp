<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ServiceProviderLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:serviceprovider');
    }

    public function showLoginForm() {
        return view('auth.serviceprovider-login');
    }

    public function login(Request $request) {
        
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('serviceprovider')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            // If successful, redirect to intended location
            return redirect()->intended(route('serviceprovider.dashboard'));

        } else {

            // if unsuccessful, redirect back to the login with the formdata. Auto populate the fields.
            return redirect()->back()->withInput($request->only('email', 'remember'));

        }        
    }
}
