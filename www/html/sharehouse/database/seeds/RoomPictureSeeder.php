<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoomPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pictures = [
            ['property_id' => 1, 'image_name' => '部屋1.jpg'],
            ['property_id' => 1, 'image_name' => '部屋2.jpg'],
            ['property_id' => 2, 'image_name' => '部屋1.jpg'],
            ['property_id' => 2, 'image_name' => '部屋2.jpg'],
            ['property_id' => 3, 'image_name' => '部屋1.jpg'],
            ['property_id' => 3, 'image_name' => '部屋2.jpg'],
            ['property_id' => 4, 'image_name' => '部屋1.jpg'],
            ['property_id' => 4, 'image_name' => '部屋2.jpg'],
            ['property_id' => 5, 'image_name' => '部屋1.jpg'],
            ['property_id' => 5, 'image_name' => '部屋2.jpg'],
            ['property_id' => 6, 'image_name' => '部屋1.jpg'],
            ['property_id' => 6, 'image_name' => '部屋2.jpg'],
            ['property_id' => 7, 'image_name' => '部屋1.jpg'],
            ['property_id' => 7, 'image_name' => '部屋2.jpg'],

        ];
        DB::table('room_pictures')->insert($pictures);
    }
}
