<?php

namespace Database\Seeders;

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
        \App\Models\SiteUser::factory(10)->create();
       // \App\Models\Blog::factory(10)->create();
        //\App\Models\Product::factory(12)->create();
         $this->call([
             Adminseeder::class,
             Permissionseeder::class]);
    }
}
