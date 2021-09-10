<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nik')-> nullable();
            $table->string('born')->nullable();
            $table->string('phone')->nullable();
            #Address
            $table->foreignId('province_id')->nullable();
            $table->foreignId('regency_id')->nullable();
            $table->foreignId('district_id')->nullable();
            #End Address
            $table->foreignId('user_id')->nullable();
            $table->string('desc')->nullable();
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
        Schema::dropIfExists('workers');
    }
}
