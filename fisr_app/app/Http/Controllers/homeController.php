<?php

namespace App\Http\Controllers;

use App\Mail\ProfileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function index(Request $request)
    {

        // Mail::to('alinaboui607@gmail.com')->send(new ProfileMail());
        return view('home');
    }
}
