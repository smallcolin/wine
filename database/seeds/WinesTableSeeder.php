<?php

use Illuminate\Database\Seeder;

class WinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Create some wines
      factory(App\Wine::class, 10)->create();
    }
}
