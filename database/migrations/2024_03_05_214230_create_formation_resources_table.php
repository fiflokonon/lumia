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
        Schema::create('formation_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->boolean('visible_for_student')->default(false);
            $table->boolean('status')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_resources');
    }
};
