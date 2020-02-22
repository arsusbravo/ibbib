<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CountriesTableSeeder::class,
            CrewsTableSeeder::class,
            CustomersTableSeeder::class,
            LanguagesTableSeeder::class,
            CategoriesTableSeeder::class,
            PricesTableSeeder::class,
            LanguageSkillTableSeeder::class,
            SkillTableSeeder::class,
        ]);
    }
}
