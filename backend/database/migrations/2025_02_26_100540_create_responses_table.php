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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compliant_id');
            $table->foreign('compliant_id')->references('id')->on('compliants')->cascadeOnDelete();
            $table->unsignedBigInteger('official_id');
            $table->foreign('official_id')->references('id')->on('officials')->cascadeOnDelete();
            $table->text('response');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
