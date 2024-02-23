<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldCategorySeeder extends Seeder
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

        DB::table('field_categories')->insert([
            [
                'title' => 'Marketing digital',
                'code'=> 'digital_marketing',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Design graphique',
                'code'=> 'graphic_designe',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Développement web et mobile',
                'code'=> 'web_mobile_development',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Informatique de base et avancée',
                'code'=> 'basic_and_advanced_computer_science',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Community management',
                'code'=> 'community_management',
                'field_id' => $digital->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Management de projet',
                'code'=> 'project_management',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Suivi évaluation apprentissage et recevabilité',
                'code'=> 'learning_evaluation',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Communication des risques et engagement communautaire',
                'code'=> 'communication_risk',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Gestion administrative, financière et comptable des ONG et institutions internationales',
                'code'=> 'administration_management',
                'field_id' => $management->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Santé publique',
                'code'=> 'public_health',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Genre - développement et santé',
                'code'=> 'gender_development_health',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Logistique humanitaire',
                'code'=> 'humanitarian_logistic',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Action humanitaire',
                'code'=> 'humanitarian_action',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Animations communautaire et mobilisation sociale',
                'code'=> 'community_animation',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Gestion des urgences de santé publique',
                'code'=> 'emergency_health',
                'field_id' => $sante->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Élaboration de business plan',
                'code'=> 'emergency_health',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Management de projet',
                'code'=> 'management_project',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Secrétariat comptable',
                'code'=> 'secretary_comptable',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Ressources humaines',
                'code'=> 'human_resource',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Gestion de caisse',
                'code'=> 'management_spot',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Achat contrat',
                'code'=> 'buy_contract',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Logistique',
                'code'=> 'logistic',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Secrétariat virtuelle',
                'code'=> 'virtual_secretary',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
            [
                'title' => 'Secrétariat administratif',
                'code'=> 'admin_secretary',
                'field_id' => $administration->id,
                'status' => true,
                'created_at' => now()
            ],
        ]);
    }
}
