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
            $table->string('surname');
            $table->string('phone')->nullable();
            $table->string('country');
            $table->enum('gender', ['male', 'female']);
            $table->string('profile_image')->nullable();
        });
    }
};
