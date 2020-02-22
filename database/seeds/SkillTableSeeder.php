<?php

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['language_skill_id' => 1],
            ['language_skill_id' => 2],
            ['language_skill_id' => 3],
            ['language_skill_id' => 4],
            ['language_skill_id' => 5],
            ['language_skill_id' => 6],
            ['language_skill_id' => 7],
            ['language_skill_id' => 8],
        ];
        foreach($data as $cols){
            $insert = new Skill;
            foreach($cols as $key=>$val){
                $insert->$key = $val;
            }
            $insert->save();
        }
    }
}
