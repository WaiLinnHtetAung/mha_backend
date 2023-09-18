<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('owner');
            $table->string('sr_no');
            $table->integer('total_room');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->longText('address');
            $table->string('web_link')->nullable();
            $table->foreignId('sub_zone_id')->nullable();
            $table->foreignId('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
