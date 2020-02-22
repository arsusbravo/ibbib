<?php

use Illuminate\Database\Seeder;
use App\Models\Price;

class PricesTableSeeder extends Seeder
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
                'role_id' => 4,
                'title' => 'One Reaction',
                'slug' => 'crew-1-credit',
                'quantity' => 1,
                'unit' => 'credit'
            ],
            [
                'role_id' => 4,
                'title' => '25 Reactions',
                'slug' => 'crew-25-credits',
                'quantity' => 25,
                'unit' => 'credit'
            ],
            [
                'role_id' => 4,
                'title' => '100 Reactions',
                'slug' => 'crew-100-credit',
                'quantity' => 100,
                'unit' => 'credit'
            ],
            [
                'role_id' => 3,
                'title' => 'Unlimited Translator for 30 days',
                'slug' => 'customer-30-days',
                'quantity' => 30,
                'unit' => 'day'
            ],
            [
                'role_id' => 3,
                'title' => 'Unlimited Translator for A year',
                'slug' => 'customer-365-days',
                'quantity' => 365,
                'unit' => 'day'
            ],
        ];
        foreach($data as $cols){
            $insert = new Price;
            foreach($cols as $key=>$val){
                $insert->$key = $val;
            }
            $insert->save();
        }
    }
}