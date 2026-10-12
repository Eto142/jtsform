<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('shared_posts', function (Blueprint $table) {
            $table->string('mail_provider')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('shared_posts', function (Blueprint $table) {
            $table->dropColumn('mail_provider');
        });
    }
};