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
            $table->dropColumn('firstname', 50);
            $table->dropColumn('surname', 50);
            $table->dropColumn('address', 100);
            $table->dropColumn('phone', 20);
            $table->dropColumn('gender', 20);
            $table->dropColumn('privacy_email');
            $table->dropColumn('privacy_name');
            $table->dropColumn('privacy_address');
            $table->dropColumn('privacy_phone');
            $table->dropColumn('privacy_gender');
        });
    }
};
