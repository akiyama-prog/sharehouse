<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pictures = [
            ['property_id' => 1, 'image_name' => 'リビング1.jpg'],
            ['property_id' => 1, 'image_name' => 'リビング2.jpg'],
            ['property_id' => 2, 'image_name' => 'リビング2.jpg'],
            ['property_id' => 2, 'image_name' => '風呂.jpg'],
            ['property_id' => 3, 'image_name' => '風呂.jpg'],
            ['property_id' => 3, 'image_name' => 'リビング1.jpg'],
            ['property_id' => 4, 'image_name' => 'リビング2.jpg'],
            ['property_id' => 4, 'image_name' => 'キッチン.jpg'],
            ['property_id' => 5, 'image_name' => 'キッチン1.jpg'],
            ['property_id' => 5, 'image_name' => 'リビング1.jpg'],
            ['property_id' => 5, 'image_name' => '部屋2.jpg'],
            ['property_id' => 6, 'image_name' => '部屋2.jpg'],
            ['property_id' => 6, 'image_name' => 'リビング2.jpg'],
            ['property_id' => 6, 'image_name' => 'キッチン.jpg'],
            ['property_id' => 7, 'image_name' => '風呂.jpg'],
            ['property_id' => 7, 'image_name' => 'リビング1.jpg'],
            ['property_id' => 7, 'image_name' => 'キッチン1.jpg'],
        ];
        DB::table('sub_pictures')->insert($pictures);
    }
}
