<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $index = 0;
        $arrRoles = [
            'admin',
            'user'
        ];
        $role = $arrRoles[$index];
        $index++;
        
        return ['name' => $role];
    }
}
