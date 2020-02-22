<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
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
            'name' => 'Ario Susmaryono',
            'email' => 'info@arsus.nl',
            'role_id' => 1,
            'active' => 1,
            'password' => Hash::make('as2075hc'),
            ],
            [
            'name' => 'Translator Tester',
            'email' => 'ario_susmaryono@hotmail.com',
            'role_id' => 4,
            'active' => 1,
            'password' => Hash::make('translator123'),
            ],
            [
            'name' => 'Agency Tester',
            'email' => 'ario@hypotheekonline.nl',
            'role_id' => 5,
            'active' => 1,
            'password' => Hash::make('agency123'),
            ]
        ];
        foreach($data as $cols){
            $insert = new User;
            foreach($cols as $key=>$val){
                $insert->$key = $val;
            }
            $insert->save();
        }
    }
}
