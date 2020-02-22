<?php

use Illuminate\Database\Seeder;
use App\Models\Crew;

class CrewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = new Crew;
        $insert->user_id = 2;
        $insert->co_name = 'ARSUS Translator';
        $insert->country_id = 156;
        $insert->standard_rates = 0.50;
        $insert->unit_rate = 'word';
        $insert->save();
    }
}