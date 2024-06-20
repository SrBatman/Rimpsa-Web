<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{

    //Twitter

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter-oauth-2')->redirect();
    }

    public function handleTwitterCallback()
    {
        try {
            $twitterUser = Socialite::driver('twitter-oauth-2')->user();
          
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('No se pudo autenticar con Twitter.');
        }

 
        $existingUser = User::where('twitter_id', $twitterUser->id)->first();
        
        if ($existingUser) { 
           
            Auth::login($existingUser, true);
        } else { 
            
            
            $newUser = User::create([
                'name' => $twitterUser->name,
                'email' => $twitterUser->email ?? $twitterUser->nickname .'@example.com',
                'twitter_id' => $twitterUser->id,
                'password' => bcrypt('secretPass12$!#'), 
            ]);

            Auth::login($newUser, true);
        }

        return redirect()->intended('/dashboard');
    }

    //Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('No se pudo autenticar con Facebook.');
        }

        $existingUser = User::where('facebook_id', $facebookUser->id)->first();
        
        if ($existingUser) { 
            Auth::login($existingUser, true);
        } else { 
            $newUser = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email ?? $facebookUser->name .'@example.com',
                'facebook_id' => $facebookUser->id,
                'password' => bcrypt('secretPass12$!#'), 
            ]);

            Auth::login($newUser, true);
        }

        return redirect()->intended('/dashboard');
    }
}