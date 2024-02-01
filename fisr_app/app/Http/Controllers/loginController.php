<?php

namespace App\Http\Controllers;

use App\Mail\ProfileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function show()
    {
        return view('login.show');
    }
    public function login(Request $request)
    {
        $login = $request->email;
        $password = $request->password;
        $credentials = ['email' => $login, "password" => $password];
        if (Auth::attempt($credentials)) {
            $profile = Auth::user();
            if (Auth::user()->hasVerifiedEmail()) {
                $request->session()->regenerate(true);
                return to_route('homepage')->with('success', 'login with success');
            } else {
                $request->session()->invalidate();
                $profile = Auth::user();
                Mail::to($profile->email)->send(new ProfileMail($profile));
                return back()->withErrors([
                    'email' => 'merci de verefier votre email pour activer votre compte ' . $profile->email
                ])->onlyInput('login');
            }
        } else {
            return back()->withErrors([
                'email' => 'email or oassword incorrect',
            ])->onlyInput('email');
        }
    }
    public function logout()
    {
        Session::flush();

        Auth::logout();
        return redirect()->route('login')->with('success', 'Vous êtes bien déconnecté.');
    }
}
