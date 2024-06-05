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
        Schema::table('users', function (Blueprint $table) {
            $table->string('signature', 100)->unique()->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('surname', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('gender', 20)->nullable();
            $table->boolean('privacy_email')->default(false);
            $table->boolean('privacy_name')->default(false);
            $table->string('privacy_address')->default(false);
            $table->string('privacy_phone')->default(false);
            $table->string('privacy_gender')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'signature','firstname','surname',
                'address','phone','gender',
                'privacy_email','privacy_name','privacy_address',
                'privacy_phone','privacy_gender']);
        });
    }
};
