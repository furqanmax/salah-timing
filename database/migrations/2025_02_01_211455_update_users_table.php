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
        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('mobileno', 20)->nullable()->after('password');
        //     $table->string('city', 50)->nullable()->after('mobileno');
        //     $table->string('zipcode', 50)->nullable()->after('city');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn(['mobileno', 'city', 'zipcode']);
        // });
    }
};
