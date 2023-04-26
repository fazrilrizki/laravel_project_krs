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
        Schema::create('mhs', function (Blueprint $table) {
            $table->string('nim', 15)->primary();
            $table->string('nama', 50);
            $table->string('pin');
            $table->string('status', 10);
            $table->timestamps();
        });

        Schema::create('mk', function (Blueprint $table) {
            $table->string('kodemk', 15)->primary();
            $table->string('namamk', 50);
            $table->integer('semester');
            $table->integer('sks');
            $table->timestamps();
        });

        Schema::create('semester', function (Blueprint $table) {
            $table->string('thn', 11)->primary();
            $table->string('smt', 11);
            $table->string('status', 10);
            $table->timestamps();
        });

        Schema::create('krs', function (Blueprint $table) {
            $table->string('nim', 15);
            $table->string('kodemk', 15);
            $table->string('thn', 11);
            $table->string('smt', 11);
            $table->timestamps();

            $table->foreign('nim')->references('nim')->on('mhs');
            $table->foreign('kodemk')->references('kodemk')->on('mk');
            $table->foreign('thn')->references('thn')->on('semester');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
