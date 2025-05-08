<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccessLevel;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\StateSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        // Para criar 10 registros de usuários aleatórios de acordo com o UserFactory;
        // \App\Models\User::factory(10)->create();
        
        $seeders = [
            [new AccessLevel(), new AccessLevelSeeder()],
            [new State(), new StateSeeder()],
            [new City(), new CitySeeder()],
            [new User(), new UserSeeder()]
        ];

        foreach($seeders as $seeder){
            if(empty(DB::table($seeder[0]->getTable())->limit(1)->count())){
                $seeder[1]->run();
            }else{
                var_dump($seeder[0]->getTable()." already populated.");
            }
            echo "\n\n";
        }

        // \App\Models\User::factory()->create([
        //     'accessLevelId' => 4,
        //     'cityId' => ???,
        //     'createrId' => null,
        //     'updaterId' => null,
        //     'name' => 'Techps Administrador',
        //     'login' => 'Techps.admin',
        //     'password' => 'pj^8Af8N$]PiuDW'
        // ]);
    }
}
