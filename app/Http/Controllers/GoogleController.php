<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\str;


class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try{
            $google = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $google->getEmail()],
                [
                    'name' => $google->getName(),
                    'google_id' => $google->getId(),
                    'password' => bcrypt(Str::random(24)),
                ],
            );

            Auth::login($user);
            return redirect()->route('dashboard');

        }catch(Exception $e){
            return redirect('/register')->with('error', 'You should Register First');
        }
    }
}
