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
        Schema::create('nilai_bobot_kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->integer('nilai_banding');
            $table->string('kriteria1')->nullable();
            $table->string('kriteria2')->nullable();
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
        Schema::dropIfExists('nilai_bobot_kriterias');
    }
};
