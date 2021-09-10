<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->assignRole($input['role']);

        if($input['role'] == 'worker'){
            Worker::create([
                'code'          => 'w'. date('dmy').Str::random(5),
                'nik'           => null,
                'born'          => null,
                'province_id'   => request('province_id'),
                'regency_id'    => request('regency_id'),
                'district_id'   => request('district_id'),
                'disc'          => null,
                'user_id'       => $user->id
            ]);
        }elseif($input['role'] == 'client'){
            Client::create([
                'code'          => 'c'. date('dmy').Str::random(5),
                'province_id'   => request('province_id'),
                'regency_id'    => request('regency_id'),
                'district_id'   => request('district_id'),
                'user_id'       => $user->id
            ]);
        }
      
        return $user;
    }
}
