<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = new Customer;
        $insert->user_id = 3;
        $insert->co_name = 'ARSUS';
        $insert->co_email = 'info@arsus.nl';
        $insert->co_phone = '0031612345678';
        $insert->country_id = 102;
        $insert->save();
    }
}
