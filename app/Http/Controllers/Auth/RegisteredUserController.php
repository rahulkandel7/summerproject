<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5048'],
            'phone' => ['required','digits:10'],
            'address'=>'required',
            'agreement' => 'required|boolean',
            'type' => ['required', 'in:tenant,landlord'],
            'gender' => 'required',
        ]); 

        if($request->hasFile('photo')){
            $fname = Str::random(20);
            $fexe = $request->file('photo')->extension();
            $fpath = "$fname.$fexe";

            $request->file('photo')->storeAs('users', $fpath, ['disk' => 'my']); 

            $data['photo'] = 'users/'.$fpath;
        }

        $data['password'] = Hash::make($request->password);
        $data['agreement']= $request->agreement == '0' ? true : false;

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'));

    }
}
