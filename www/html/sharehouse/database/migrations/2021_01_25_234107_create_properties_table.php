<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('property_name')->index();
            $table->string('route1'); //路線
            $table->string('station1');
            $table->integer('station_walk1')->nullable(); //駅徒歩
            $table->string('route2')->nullable(); //路線
            $table->string('station2')->nullable();
            $table->integer('station_walk2')->nullable(); //駅徒歩
            $table->string('postcode'); //郵便番号
            $table->string('city')->index(); //区
            $table->string('street')->nullable(); //丁目
            $table->text('lounge')->nullable(); //ラウンジメモ
            $table->text('kitchen')->nullable(); //キッチンメモ
            $table->text('shawer')->nullable();
            $table->text('bath')->nullable();
            $table->boolean('is_bath_free')->nullable();
            $table->text('laundry')->nullable();
            $table->boolean('is_laundry_free')->nullable();
            $table->text('dryer')->nullable(); //乾燥機メモ
            $table->boolean('is_dryer_free')->nullable();
            $table->text('toilet')->nullable();
            $table->text('parking')->nullable(); //駐輪場
            $table->boolean('is_parking')->nullable(); //駐輪場はある？
            $table->boolean('is_parking_free')->nullable();
            $table->string('internet')->nullable(); //インターネット回線
            $table->text('internet_memo')->nullable();
            $table->boolean('is_internet_free')->nullable();
            $table->integer('total_rooms')->nullable(); //部屋数合計
            $table->integer('update_term')->nullable(); //更新期間
            $table->string('area_info1')->nullable(); //周辺施設
            $table->integer('area_info_walk1')->nullable(); //周辺施設徒歩
            $table->string('area_info2')->nullable(); //周辺施設
            $table->integer('area_info_walk2')->nullable(); //周辺施設徒歩
            $table->string('area_info3')->nullable(); //周辺施設
            $table->integer('area_info_walk3')->nullable(); //周辺施設徒歩
            $table->string('area_info4')->nullable(); //周辺施設
            $table->integer('area_info_walk4')->nullable(); //周辺施設徒歩
            $table->string('clean_style')->nullable(); //清掃スタイル
            $table->string('clean_frequency')->nullable(); //清掃頻度
            $table->string('rule1')->nullable();
            $table->string('rule2')->nullable();
            $table->string('rule3')->nullable();
            $table->string('rule4')->nullable();
            $table->string('rule5')->nullable();
            $table->string('main_image')->nullable(); //メイン写真
            $table->text('introduce')->nullable(); //物件紹介
            $table->unsignedInteger('area_id'); //エリアid
            $table->boolean('is_private_room')->nullable(); //個室あり？
            $table->boolean('is_dormitory')->nullable(); //ドミトリーあり？
            $table->boolean('is_women_only')->nullable(); //女性のみ？
            $table->boolean('is_vacancy')->nullable(); //空室あり？
            $table->boolean('is_foreigner')->nullable(); //外国人ok？
            $table->boolean('is_animals')->nullable(); //ペットok？
            $table->string('feature1')->nullable(); //特徴
            $table->string('feature2')->nullable(); //特徴
            $table->string('feature3')->nullable(); //特徴
            $table->string('campaign')->nullable(); //キャンペーン
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
