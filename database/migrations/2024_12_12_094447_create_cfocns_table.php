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
        Schema::create('cfocns', function (Blueprint $table) {
            $table->id();
            $table->string('active_id');
            $table->string('work_order');
            $table->string('port');
            $table->string('pos');
            $table->string('team_install');
            $table->string('create_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cfocns');
    }
};
