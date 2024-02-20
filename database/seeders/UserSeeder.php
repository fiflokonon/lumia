<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_secretary = Role::where('code', 'secretary')->first();

        User::create([
           'first_name' => 'Admin',
           'last_name' => 'Admin',
           'role_id' =>  $role_secretary->id,
           'email' => 'secretariat@lumia.com',
           'phone' => '229',
           'password' => Hash::make('password'),
           'status' => true
        ]);
    }
}
