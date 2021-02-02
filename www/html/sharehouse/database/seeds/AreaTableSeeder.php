<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['id' => 1, 'area_name' => '新宿・渋谷・六本木', 'cities' => '新宿区,渋谷区,港区,中央区,千代田区'],
            ['id' => 2, 'area_name' => '中野・高円寺', 'cities' => '中野区,杉並区,練馬区'],
            ['id' => 3, 'area_name' => '下北沢・中目黒', 'cities' => '世田谷区,目黒区,品川区,大田区'],
            ['id' => 4, 'area_name' => '池袋・後楽園・巣鴨', 'cities' => '豊島区,文京区,荒川区,北区,足立区,板橋区'],
            ['id' => 5, 'area_name' => '上野・浅草・錦糸町', 'cities' => '台東区,墨田区,葛飾区,江東区,江戸川区'],
        ];
        DB::table('areas')->insert($areas);
    }
}
