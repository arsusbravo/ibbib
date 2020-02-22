<?php

use Illuminate\Database\Seeder;
use App\Models\LanguageSkill;

class LanguageSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'from' => 1,
                'to' => 2,
            ],
            [
                'from' => 1,
                'to' => 3,
            ],
            [
                'from' => 1,
                'to' => 4,
            ],
            [
                'from' => 2,
                'to' => 1,
            ],
            [
                'from' => 2,
                'to' => 3,
            ],
            [
                'from' => 2,
                'to' => 4,
            ],
            [
                'from' => 3,
                'to' => 1,
            ],
            [
                'from' => 3,
                'to' => 2,
            ],
        ];
        foreach($data as $cols){
            $insert = new LanguageSkill;
            foreach($cols as $key=>$val){
                $insert->$key = $val;
            }
            $insert->save();
        }
    }
}
