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
        try {

            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::guard('customer')->attempt($credentials)) {
                return redirect()->route('customer.home'); // Change '/dashboard' to your desired redirect path
            }

            return redirect()->route('customer.login')->withErrors(['email' => 'تأكد من البيانات يمكنك التواصل مع ممثل خدمة العملاء لإعادة تعيين كلمة مرورك'])->withInput();
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
