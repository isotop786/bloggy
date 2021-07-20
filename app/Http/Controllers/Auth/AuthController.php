<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // register form
    public function register_form()
    {
        return view('auth.register');
    }

    // login form 
    public function login_form()
    {
        return view('auth.login');
    }

    public function register(Request $request, User $user)
    {
       

        $request->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255|unique:users',
            'email'=>'email|max:255|unique:users',
            'password'=>'required|confirmed|min:6',
            'image' => 'image|mimes:png,jpg'
        ]);

        // dd("perfect");

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            // $this->save();

              // storing data with image
                $user->create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'image' => $name
                ]);
        }else{
              // storing data without image
        $user->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        }

      

        // sign in 
        auth()->attempt($request->only('email','password'));

        return redirect()->route('home');


    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only(['email','password']))){
            return back()->with('status','Invalid email/password');
        }

        auth()->attempt($request->only(['email','password']));

        return redirect()->route('home')->with('status','Login success');

    }

    public function logout(Request $request)
    {
        Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();

    return redirect('/');
    }
}
