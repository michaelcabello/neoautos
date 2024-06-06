<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Carbon\Carbon;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
        $facebookuser = Socialite::driver('facebook')->user();
        $ourUser = User::where('external_provider', 'facebook')
                        ->where('external_id', $facebookuser->getId())->first();

        if($ourUser){
            Auth::login($ourUser);
            return redirect("/dashboard");
        }

        User::create([
            'name'=> $facebookuser->getName(),
            'email'=> $facebookuser->getEmail(),
            'email_verified_at'=> Carbon::now(),
            'razonsocial'=> $facebookuser->getName(),
            'external_provider'=> 'facebook',
            'external_id'=> $facebookuser->getId(),
        ]);

        return redirect()->route('dashboard');

    }


    public function facebookpp(){
        return view('facebook.facebookpp');
    }

    public function facebooktos(){
        return view('facebook.facebooktos');
    }
}
