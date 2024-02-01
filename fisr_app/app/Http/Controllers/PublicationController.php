<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Requests\PublicationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::paginate(10);
        return view('publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {

        $formfields = $request->validated();
        $this->uploadImage($request, $formfields);
        $formfields['profile_id'] = Auth::id();
        Publication::create($formfields);
        return to_route('publications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        return view('publication.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $this->authorize('update', $publication); // this line is  same ->
        // if (!Gate::allows('update_publication', $publication)) {
        //     abort(403);
        // }
        return view('publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $this->authorize('update', $publication);
        // if (!Gate::allows('update_publication', $publication)) {
        //     abort(403);
        // }
        $formfields = $request->validated();
        $this->uploadImage($request, $formfields);
        $publication->fill($formfields)->save();
        return to_route('publications.show', $publication->id)->with('success', 'publication a ete bien modefier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $this->authorize('delete', $publication);
        $publication->delete();
        return to_route('publications.index')->with('success', 'publications a ete bien suprimer.');
    }


    private function uploadImage(PublicationRequest $request, array &$formfields)
    {
        if ($request->hasFile('image')) {
            $formfields['image'] = $request->file('image')->store('publication', 'public');
        }
    }
}
