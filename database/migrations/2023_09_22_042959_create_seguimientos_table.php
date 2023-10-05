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
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id('id_seg');
            $table->bigInteger('num_seg');
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            // $table->boolean('asistencia')->default(false);
            $table->string('titulo');
            $table->longText('observaciones');
            $table->string('tutor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
