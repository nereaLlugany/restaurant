<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $profiles = User::all();
        return view('profile.list', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bio' => 'nullable|string',
        ]);

        User::create($request->all());
        return redirect()->route('profiles.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(User $profile)
    {
        return view('profile.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(User $profile)
    {
        return view('profile.edit', ['profile' => $profile]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $profile)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bio' => 'nullable|string',
        ]);

        $profile->update($request->all());
        return redirect()->route('profiles.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(User $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index');
    }
}
