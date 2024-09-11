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
        Schema::create('cfos', function (Blueprint $table) {
            $table->id();
            $table->string('active_id');
            $table->string('name');
            $table->string('active');
            $table->string('date');
            $table->string('infrastructure');
            $table->string('jobs_id');
            $table->string('category');
            $table->string('installation_order');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cfos');
    }
};
