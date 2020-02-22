<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
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
            'name' => 'Super Admin',
            'slug' => 'master'
            ],
            [
            'name' => 'Admin',
            'slug' => 'admin'
            ],
            [
            'name' => 'Editor',
            'slug' => 'worker'
            ],
            [
            'name' => 'Translator',
            'slug' => 'crew'
            ],
            [
            'name' => 'Agency',
            'slug' => 'customer'
            ]
        ];
        foreach($data as $cols){
            $insert = new Role;
            foreach($cols as $key=>$val){
                $insert->$key = $val;
            }
            $insert->save();
        }
    }
}
