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
        Schema::create('fichas', function (Blueprint $table) {
            $table->id('id_ficha');
            $table->unsignedBigInteger('user')->nullable();
            $table->foreign('user')->references('id')->on('users');
            $table->longText('familia');
            // llenar de campos que necesiten las fichas de informacion
            // para checkboxes
            // $table->boolean('checkbox_option1')->default(false);
            // para radios
            // $table->string('radio_option')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};
