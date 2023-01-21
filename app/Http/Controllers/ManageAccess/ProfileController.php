<?php

namespace App\Http\Controllers\ManageAccess;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Models\ManageAccess\Profile;
use App\Http\Resources\ManageAccess\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('viewAny', Post::class);
        // $posts = PostResource::collection(Post::all());

        $this->authorize('viewAny', Profile::class);
        $profiles = ProfileResource::collection(Profile::all());
        // $profiles = Profile::all();
        // dd($profiles);
        return inertia('Profiles/Index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Profile::class);
        return inertia('Profiles/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $this->authorize('create', Profile::class);
        Profile::create($request->validated());

        return redirect()->route('profiles.index')
            ->with('message', 'Profile created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManageAccess\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManageAccess\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $this->authorize('viewAny', Profile::class);
        return inertia('Profiles/Edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManageAccess\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Profile $profile, StoreProfileRequest $request)
    {
        $this->authorize('update', Profile::class);
        // dd($request->status);
        $request->status = ($request->status) ? 1 : 0;
        $profile->update($request->validated());

        return redirect()->route('profiles.index')
            ->with('message', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManageAccess\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $this->authorize('delete', Profile::class);
        $profile->delete();

        return redirect()->route('profiles.index')
            ->with('message', 'Profile deleted successfully');
    }
}
