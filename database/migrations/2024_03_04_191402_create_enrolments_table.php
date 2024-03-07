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
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('formation_id');
            $table->string('payment_link')->nullable();
            $table->json('payment_details')->nullable();
            $table->string('payment_status')->nullable();
            $table->boolean('enrolment_confirmation')->default(false);
            $table->string('certificate_link')->nullable();
            $table->boolean('resource_access')->default(false);
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
        Schema::dropIfExists('enrolments');
    }
};
