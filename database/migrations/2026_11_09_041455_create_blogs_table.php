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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_category_id')->constrained('categories_blogs')->restrictOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brief_description')->nullable();
            $table->longText('content')->nullable();
            $table->string('cover_path')->nullable();
            $table->string('author')->default('team sticker PPKD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
