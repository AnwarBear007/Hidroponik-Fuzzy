<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->integer('hidroponik_id')->nullable();
            $table->integer('crop_id');
            $table->date('tanggal')->nullable();
            $table->integer('jumlah')->nullable();
            $table->float('volume')->nullable();
            $table->float('larutan')->nullable();
            $table->integer('ppm')->nullable();
            $table->enum('kondisi', ['buruk', 'baik']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
