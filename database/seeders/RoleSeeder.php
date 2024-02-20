<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client_role = Role::firstOrCreate([
            'code' => 'client'
        ], [
            'title' => 'Membre',
            'description' => 'Utilisateur',
            'status' => true
        ]);

        $secretary_role = Role::firstOrCreate([
            'code' => 'secretary'
        ], [
            'title' => 'Sécrétaire',
            'description' => 'Sécrétaire interne',
            'status' => true
        ]);


        $secretary_role = Role::firstOrCreate([
            'code' => 'admin'
        ], [
            'title' => 'Administrateur',
            'description' => 'Administrateur',
            'status' => true
        ]);
    }
}
