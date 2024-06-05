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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('address', 100)->unique();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('path');
            $table->string('size');
            $table->string('hash', 100)->unique();
            $table->boolean('is_url')->default(false);
            $table->boolean('privacy_email')->default(false);
            $table->boolean('privacy_name')->default(false);
            $table->string('privacy_address')->default(false);
            $table->string('privacy_phone')->default(false);
            $table->string('privacy_gender')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
