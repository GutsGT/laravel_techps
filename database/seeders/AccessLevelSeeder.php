<?php

namespace Database\Seeders;

use App\Models\AccessLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessLevelSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        $accessLevels = [
            [
                'name'          =>  'Desenvolvedor',
                'description'   =>  'Para uso exclusivo dos desenvolvedores do sistema.'
            ],
            [
                'name'          =>  'Administrador',
                'description'   =>  'Para usuários que desejam cadastrar e gerenciar informações importantes da filial e gerenciar os funcionários.'
            ],
            [
                'name'          =>  'Funcionário',
                'description'   =>  'Para usuários que farão a gestão dos motoristas da filial, um funcionário não deve influenciar nas informações de outros funcionários.'
            ],
            [
                'name'          =>  'Pessoal',
                'description'   =>  'Para usuários que farão a gestão apenas das próprias informações como espelhos de ponto, informações do próprio usuário e batidas de ponto.'
            ],
        ];

        foreach($accessLevels as $accessLevel){
            AccessLevel::factory()->create($accessLevel);
        }
    }
}
