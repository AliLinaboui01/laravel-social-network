<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    private const CACHK_KEY = 'profiles_api';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Cache::remember(self::CACHK_KEY, 14400, function () {

            return ProfileResource::collection(Profile::all());
        });
        return $profiles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formfields = $request->all();
        $formfields['password'] = Hash::make($request->password);
        $profile = Profile::create($formfields);
        Cache::forget(self::CACHK_KEY);
        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $formfields = $request->all();
        $formfields['password'] = Hash::make($request->password);
        $profile->fill($formfields)->save();
        Cache::forget(self::CACHK_KEY);
        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        Cache::forget(self::CACHK_KEY);
        return response()->json([
            'message' => 'le profilr est bien suprimer',
            'id' => $profile->id,
        ]);
    }
}
