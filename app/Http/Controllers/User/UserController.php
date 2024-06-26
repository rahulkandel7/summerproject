<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->id == Auth::user()->id) {
            return view('users.edit', compact('user'));
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',

            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
            'phone' => ['nullable', 'digits:10'],
            'address' => 'nullable',
            'bio' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            $fname = Str::random(20);
            $fexe = $request->file('photo')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photo')->storeAs('users', $fpath, ['disk' => 'my']);

            if ($user->photo) {
                Storage::disk('my')->delete('users/' . $user->photo);
            }

            $data['photo'] = 'users/' . $fpath;
        }

        $data['password'] = Hash::make($request->password);

        $user->update($data);

        return redirect(route('home'))->with('sucess', 'Your profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
