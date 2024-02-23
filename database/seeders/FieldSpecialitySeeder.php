<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $digital = Field::where('code', 'digital')->first();
        $management = Field::where('code', 'management')->first();
        $sante = Field::where('code', 'sante')->first();
        $administration = Field::where('code', 'administration')->first();

        DB::table('field_specialities')->insert([
            [
                'title' => 'Marketing digital',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Design graphique',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Développement web et mobile',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Informatique de base et avancée',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Community management',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Management de projet',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Suivi évaluation apprentissage et recevabilité',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Communication des risques et engagement communautaire',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Gestion administrative, financière et comptable des ONG et institutions internationales',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Santé publique',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Genre - développement et santé',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Logistique humanitaire',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Action humanitaire',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Animations communautaire et mobilisation sociale',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Gestion des urgences de santé publique',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Élaboration de business plan',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Management de projet',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Secrétariat comptable',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Ressources humaines',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Gestion de caisse',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Achat contrat',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Logistique',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Secrétariat virtuelle',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Secrétariat administratif',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
        ]);
    }
}
