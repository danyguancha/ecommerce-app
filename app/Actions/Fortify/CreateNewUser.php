<?php

namespace App\Actions\Fortify;

use DB;
use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Mail\sendNewUser;
use Illuminate\Support\Facades\Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'type_document' => ['required', 'string', 'max:255'],
            'number_document' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'type_document' => $input['type_document'],
            'number_document' => $input['number_document'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        Mail::to($user->email)->send(new sendNewUser($user));
        return $user;
    }
}
