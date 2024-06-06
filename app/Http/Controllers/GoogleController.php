<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Carbon\Carbon;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback(){
        $googleuser = Socialite::driver('google')->user();
        $ourUser = User::where('external_provider', 'google')
                        ->where('external_id', $googleuser->getId())->first();

        //dd($googleuser->getId());

        if($ourUser){
            Auth::login($ourUser);
            return redirect("/dashboard");
        }

        User::create([
            'name'=> $googleuser->getName(),
            'email'=> $googleuser->getEmail(),
            //'slug'=> $googleuser->getName(),
            'email_verified_at'=> Carbon::now(),
            'razonsocial'=> $googleuser->getName(),
            //'state' => 1,
            'external_provider'=> 'google',
            'external_id'=> $googleuser->getId(),
        ]);

        return redirect()->route('dashboard');

    }
}

