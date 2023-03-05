<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

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
        $userModel = User::where('facebook_id', $user->id)->first();
        if (!$userModel) {
            $userModel = new User([
                'name' => $user->name,
                'email' => $user->email,
                'password' => 'tumee',
                'facebook_id' => $user->id
            ]);

            $userModel->save();
        }
        // ログインする
        Auth::login($userModel);
        // /homeにリダイレクト
        return Redirect::route('index');
    }
}