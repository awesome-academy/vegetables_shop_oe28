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
         $this->call(SupplierTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(PostTableSeeder::class);
    }
}
