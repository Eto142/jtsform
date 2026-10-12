<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shared_posts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('writeup');
            $table->string('token')->unique();
            $table->boolean('phone_share')->default(false);
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shared_posts');
    }
};
