<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $cities = json_decode(file_get_contents('resources/js/cities.json'));

        $stateObj = new State();
        
        foreach($cities as $city){
            $state = DB::table($stateObj->getTable())->where('name', '=', $city->UF->nome)->limit(1)->get();
            City::factory()->create([
                'state_id' => $state[0]->id,
                'name' => $city->nome,
            ]);
        }
    }
}
