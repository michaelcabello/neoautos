<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {



        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'razonsocial' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            //'g-recaptcha-response' => 'required|captcha',
        ])->validate();

        // $userii = User::create([
        return User::create([
            'name' => $input['name'],
            'razonsocial' => $input['razonsocial'],
            'email_verified_at' => Carbon::now(),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        //se crea la compania
/*         Company::create([
            'user_id' => $userii['id']
        ]);

        return $userii; */

    }
}
