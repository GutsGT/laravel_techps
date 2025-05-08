<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder{
    public function run(): void{
        $states = json_decode(file_get_contents('resources/js/states.json'));
        
        foreach($states as $state){
            DB::table('states')->insert([
                'name' => $state->nome,
                'acronym' => $state->sigla,
                'region' => $state->regiao
            ]);
        }
    }
}
