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
            AreaTableSeeder::class,
            PropertySeeder::class,
            RoomsSeeder::class,
            SubPictureSeeder::class,
        ]);
    }
}
