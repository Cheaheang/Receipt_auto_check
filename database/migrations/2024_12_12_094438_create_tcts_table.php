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
        Schema::create('tcts', function (Blueprint $table) {
            $table->id();
            $table->string('tct_cid');
            $table->string('tct_sid');
            $table->string('new_circuit_id');
            $table->string('total_nrc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tcts');
    }
};
