<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer');
    }
    public function showLoginForm()
    {
        return view('customer-portal.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('/portals/customer/home'); // Change '/dashboard' to your desired redirect path
        }

        return back()->withErrors(['email' => 'تأكد من البيانات يمكنك التواصل مع ممثل خدمة العملاء لإعادة تعيين كلمة مرورك'])->withInput();
    }
}
