<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Mail\ProfileMail;
use App\Models\profile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class iamgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('verifyEmail');
    }
    public function index()
    {
        $profiles = Cache::remember('profiles', 10, function () {
            return profile::paginate(9);
        });
        $users = $profiles->items();
        return view('profile.profiles', compact('users', 'profiles'));
    }

    public function show(string $id)
    {
        // $id = (int)$request->id;
        // $profile = profile::findOrfail($id);
        // dd($id);
        // $profile = ($id);
        $profile = Cache::remember('profile_' . $id, 10, function () use ($id) {
            return profile::findOrfail($id);
        });

        return view('profile.show', compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }


    public function store(ProfileRequest $request)
    {
        //validation
        $formfields = $request->validated();
        $formfields['password'] = Hash::make($request->password);
        // if ($request->hasFile('image')) {
        //     $formfields['image'] = $request->file('image')->store('profile', 'public');
        // }
        $this->uploadImage($request, $formfields);

        //Insertion
        $profile = profile::create($formfields);
        Mail::to($profile->email)->send(new ProfileMail($profile));
        return  redirect()->route('profiles.index')->with('success', 'votre compte est bien cree');
    }


    public function verifyEmail(Request $request)
    {
        [$createdAt, $id] = explode('///', base64_decode($request->hash));
        $profile = Profile::findOrFail($id);

        if ($profile->created_at->toDateTimeString() !== $createdAt) {
            abort(403);
        }

        if ($profile->email_verified_at !== NULL) {
            return response('Compte déja activé');
        }

        $name = $profile->name;
        $email = $profile->email;
        $profile->fill([
            'email_verified_at' => date('Y-m-d H:i:s', time()) // Convert Unix timestamp to datetime format
        ])->save();

        return view('profile.email_verified', compact('name', 'email'));
    }


    public function destroy(profile $profile)
    {
        $profile->delete();
        return to_route('profiles.index')->with('success', 'profile was delted successfuly');
    }


    public function edit(profile $profile)
    {
        // dd($profile);
        return view('profile.edite', compact('profile'));
    }


    public function update(ProfileRequest $request, profile $profile)
    {
        $formfields = $request->validated();
        $formfields['password'] = Hash::make($request->password);
        // if ($request->hasFile('image')) {
        //     $formfields['image'] = $request->file('image')->store('profile', 'public');
        // }
        $this->uploadImage($request, $formfields);
        $profile->fill($formfields)->save();
        return  redirect()->route('profiles.show', $profile->id)->with('success', 'votre compte est bien modefier');
    }

    private function uploadImage(ProfileRequest $request, array &$formfields)
    {
        if ($request->hasFile('image')) {
            $formfields['image'] = $request->file('image')->store('profile', 'public');
        }
    }
}
/*
// if ($request->hasFile('image')) {
        //     $formfields['image'] = $request->file('image')->store('profile', 'public');
        // }
        $formfields['image'] = $this->uploadImage($request);

*/
