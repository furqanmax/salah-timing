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
        Schema::create('mosques', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->string('email2', 50)->nullable();
            $table->string('mobileno', 20)->nullable();
            $table->string('mobileno2', 20)->nullable();
            $table->string('masjidname', 250);
            $table->string('address', 250);
            $table->string('city', 50);
            $table->string('zipcode', 50);
            $table->string('state', 50);
            $table->string('addresslink', 250);
            $table->string('fajr', 50)->nullable();
            $table->string('zohar', 200)->nullable();
            $table->string('asr', 200)->nullable();
            $table->string('maghrib', 200)->nullable();
            $table->string('isha', 200)->nullable();
            $table->string('juma', 200)->nullable();
            $table->boolean('forladies')->default(false);
            $table->dateTime('timestamp')->nullable();
            $table->string('reset_token', 250)->nullable();
            $table->dateTime('reset_expiry')->nullable();
            $table->longText('aelaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosques');
    }
};
