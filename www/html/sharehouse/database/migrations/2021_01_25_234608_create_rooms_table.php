<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->unsignedBigInteger('property_id')->index();
            $table->unsignedInteger('room_number')->index();
            $table->float('room_size');
            $table->integer('security_deposit')->nullable(); //敷金
            $table->integer('key_money')->nullable(); //礼金
            $table->integer('deposit')->nullable(); //保証金
            $table->integer('management_fee')->nullable(); //管理費
            $table->integer('lent')->nullable(); //賃料
            $table->text('facility')->nullable(); //部屋設備
            $table->string('utility_costs')->nullable(); //光熱費
            $table->boolean('is_vacancy')->nullable(); //空室?
            $table->string('image')->nullable(); //写真
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
