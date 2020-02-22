<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
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
            'name' => 'Law',
            'slug' => 'law'
            ],
            [
            'name' => 'Technic',
            'slug' => 'technic'
            ],
            [
            'name' => 'Commercial/Advertising',
            'slug' => 'advertising'
            ],
            [
            'name' => 'Entertainment',
            'slug' => 'entertainment'
            ],
            [
            'name' => 'Medical',
            'slug' => 'medical'
            ],
        ];
        foreach($data as $cols){
            $insert = new Category;
            foreach($cols as $key=>$val){
                $insert->$key = $val;
            }
            $insert->save();
        }
    }
}