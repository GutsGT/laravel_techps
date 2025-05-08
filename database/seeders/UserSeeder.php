<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        $cityName = "Natal";
        $accessLevelName = "Desenvolvedor";

        $city = DB::table('cities')->where('name', '=', $cityName)->limit(1)->get()[0];
        $accessLevel = DB::table('access_levels')->where('name', '=', $accessLevelName)->limit(1)->get()[0];

        if(empty($city) || empty($accessLevel)){
            var_dump("City or Access Level not found"); echo "\n\n";
            var_dump($city); echo "\n\n";
            var_dump($accessLevel); echo "\n\n";
            return;
        }

        User::factory()->create([
            'access_level_id' => $accessLevel->id,
            'city_id' => $city->id,
            'creater_id' => null,
            'updater_id' => null,
            'login' => 'Techps.admin',
            'name' => 'Administrador Techps',
            'password' => 'pj^8Af8N$]PiuDW',
            'email' => 'techps@techps.com',
        ]);

        User::factory()->create([
            'access_level_id' => $accessLevel->id,
            'city_id' => $city->id,
            'creater_id' => 1,
            'updater_id' => null,
            'login' => 'otavio',
            'name' => 'Otávio Augusto',
            'password' => 'otavio_dev',
            'email' => 'otavio@techps.com.br',
        ]);
    }
}
