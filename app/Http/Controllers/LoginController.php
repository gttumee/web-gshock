<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use PharIo\Manifest\Url;

class LoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
            $userModel= User::updateOrCreate(
                ['facebook_id' => $user->id],
                ['name' => $user->name, 'email' => $user->email, 'password' => 'tumee','facebook_id' => $user->id]
            );
        // ログインする
        Auth::login($userModel);
        // /homeにリダイレクト
        return redirect('/shop');
    }
}