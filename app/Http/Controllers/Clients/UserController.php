<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterClientRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        if(Auth::check()) {

            return redirect()->route('client.homepage');
        }

        return view('client.user.register');
    }

    public function postRegister(RegisterClientRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Auth::login($user);

        return redirect()->route('client.homepage')->with('success', trans('messages.register_success'));
    }

    public function getLogin()
    {
        if(Auth::check()) {

            return redirect()->route('client.homepage');
        }

        return view('client.user.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('client.homepage')->with('success', trans('messages.login_success'));
        } else {

            return redirect()->route('client.post_login')->with('login_fail', trans('messages.login_fail'));
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('client.homepage')->with('success', trans('messages.logout_success'));
    }

    public function getProfile()
    {
        if(Auth::check()) {

            return view('client.user.profile');
        } else {

            return redirect()->route('client.get_login');
        }
    }

    public function postProfile(UpdateProfileRequest $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
        } catch (ModelNotFoundException $exception) {

            return back()->withErrors($exception->getMessage())->withInput();
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', trans('messages.update_profile_success'));
    }
}
