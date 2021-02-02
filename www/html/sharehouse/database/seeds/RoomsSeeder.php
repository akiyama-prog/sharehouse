<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            ['id' => 1, 'property_id' => 1, 'room_number' => 2, 'room_size' => 11.8, 'security_deposit' => 40000, 'deposit' => 10000, 'key_money' => 0, 'management_fee' => 10000, 'lent' => 59000, 'facility' => 'エアコン,クローゼット,ベッド,ロールカーテン,室内ＵＢ（シャワー、トイレ）,室内キッチン', 'utility_costs' => '使用分のみ', 'is_vacancy' => true, 'memo' => '地下１階。西北窓。フローリング。デポジット（¥50,000）は解約時に半分償却。2名入居NG'],
            ['id' => 2, 'property_id' => 1, 'room_number' => 10, 'room_size' => 6.9, 'security_deposit' => 40000, 'deposit' => 10000, 'key_money' => 0, 'management_fee' => 10000, 'lent' => 63000, 'facility' => 'エアコン,クローゼット,ベッド,ロールカーテン,室内ＵＢ（シャワー、トイレ）,室内キッチン', 'utility_costs' => '使用分のみ', 'is_vacancy' => true, 'memo' => '２階。東南窓。フローリング。光熱費（電気代）は使用分のみ個別請求。デポジット（¥50,000）は解約時に半分償却。2名入居NG。'],
            ['id' => 3, 'property_id' => 2, 'room_number' => 303, 'room_size' => 4.4, 'security_deposit' => 40000, 'key_money' => 0, 'deposit' => 10000, 'management_fee' => 15000, 'lent' => 84000, 'facility' => 'エアコン,机,椅子,収納棚,TV,冷蔵庫,24h換気扇', 'is_vacancy' => true, 'memo' => '3F,床材は洋室（合板フローリング）,陽当たりA,窓の向きは北西,2名入居NG,デポジットは清掃費、審査費、事務手数料として¥30000償却', 'utility_costs' => '使用分のみ'],
            ['id' => 4, 'property_id' => 3, 'room_number' => 203, 'room_size' => 4.6, 'security_deposit' => 10000, 'deposit' => 0, 'key_money' => 0, 'management_fee' => 10000, 'lent' => 45000, 'facility' => 'エアコン,冷蔵庫,鏡', 'is_vacancy' => true, 'memo' => '　2F。 床材は洋室（合板フローリング）。 陽当たりA。 窓の向きは北、東。 2名入居NG。 1年間以上入居の場合、保証金は清掃費として￥20000円償却。', 'utility_costs' => '使用分のみ'],
            ['id' => 5, 'property_id' => 4, 'room_number' => 102, 'room_size' => 6.5, 'security_deposit' => 30000, 'key_money' => 0, 'deposit' => 10000, 'management_fee' => 10000, 'lent' => 68000, 'facility' => 'エアコン', 'is_vacancy' => true, 'memo' => '1F。 床材は洋室（無垢材フローリング）。 陽当たりA。 窓の向きは東、南。 2名入居NG。 出窓付き。', 'utility_costs' => '使用分のみ'],
            ['id' => 6, 'property_id' => 4, 'room_number' => 203, 'room_size' => 6.7, 'security_deposit' => 30000, 'key_money' => 0, 'deposit' => 10000, 'management_fee' => 10000, 'lent' => 74000, 'facility' => 'エアコン', 'is_vacancy' => true, 'memo' => '2F。 床材は洋室（無垢材フローリング）。 陽当たりA。 窓の向きは北、東。 2名入居NG。 収納、2.0平米のロフト付き。', 'utility_costs' => '使用分のみ'],
            ['id' => 7, 'property_id' => 5, 'room_number' => 102, 'room_size' => 6.4, 'security_deposit' => 50000, 'deposit' => 0, 'key_money' => 0, 'management_fee' => 13000, 'lent' => 54000, 'facility' => 'エアコン、カーテン。', 'is_vacancy' => true, 'memo' => '1F。 床材は洋室（合板フローリング）。 陽当たりA。 窓の向きは南、西。 2名入居NG。 デポジットは基本的に全額返金。収納付き。 無線LANあり。', 'utility_costs' => '使用分のみ'],
            ['id' => 8, 'property_id' => 5, 'room_number' => 303, 'room_size' => 7.2, 'security_deposit' => 50000, 'deposit' => 0, 'key_money' => 0, 'management_fee' => 13000, 'lent' => 56000, 'facility' => 'エアコン、デスク、カーテン。', 'is_vacancy' => true, 'memo' => '3F。 床材は洋室（合板フローリング）。 陽当たりA。 窓の向きは南。 2名入居NG。 デポジットは基本的に全額返金。収納付き。 無線LANあり。', 'utility_costs' => '使用分のみ'],
            ['id' => 9, 'property_id' => 6, 'room_number' => 101, 'room_size' => 5.1, 'security_deposit' => 20000, 'key_money' => 0, 'deposit' => 10000, 'management_fee' => 15000, 'lent' => 49000, 'facility' => 'エアコン、机、椅子、ベッド下収納。', 'is_vacancy' => true, 'memo' => '1F。 床材は洋室。 陽当たりA。 窓の向きは南。 2名入居NG。 保証金はクリーニング代として￥20000償却。 無線LANあり。', 'utility_costs' => '使用分のみ'],
            ['id' => 10, 'property_id' => 6, 'room_number' => 103, 'room_size' => 4.8, 'security_deposit' => 20000, 'key_money' => 0, 'deposit' => 10000, 'management_fee' => 15000, 'lent' => 48000, 'facility' => 'エアコン、机、椅子、ベッド下収納。', 'is_vacancy' => true, 'memo' => '1F。 床材は洋室。 陽当たりB。 窓の向きは北、東。 2名入居NG。 保証金はクリーニング代として￥20000償却。', 'utility_costs' => '使用分のみ'],
            ['id' => 11, 'property_id' => 7, 'room_number' => 201, 'room_size' => 5.6, 'security_deposit' => 37000, 'deposit' => 36000, 'key_money' => 0, 'management_fee' => 15000, 'lent' => 73000, 'facility' => '冷蔵庫', 'is_vacancy' => true, 'memo' => '2F。 床材は洋室（無垢材フローリング）。 陽当たりA。 窓の向きは東。 2名入居NG。 クローゼット付き。無線LANあり。', 'utility_costs' => '使用分のみ']
        ];
        DB::table('rooms')->insert($rooms);
    }
}
