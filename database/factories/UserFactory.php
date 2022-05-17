<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $indexUser = -1;
        static $indexScip = 0;
        $arrName = [
            'Admin',
            'Bloger'

        ];
        $arrEmail = [
            'admin@test.com',
            'bloger@test.com'
        ];
        $arrPassword = [
            '12345678',
            '123456789'
        ];
        $idRole = Role::skip($indexScip)->first()->id;
        $indexUser++;
        $indexScip++;
        return [
            'name' => $arrName[$indexUser],
            'roles_id' => $idRole,
            'email' => $arrEmail[$indexUser],
            'email_verified_at' => now(),
            'password' => Hash::make($arrPassword[$indexUser]), // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
