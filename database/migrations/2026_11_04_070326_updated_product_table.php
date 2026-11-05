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
        Schema::table('produks', function (Blueprint $table) {
            //
            if (Schema::hasColumn('produks', 'stock')) {
                # code...
                $table->dropColumn('stock');
            }
            $table->string('slug')->nullable()->after('name');
            $table->integer('price_art_carton')->nullable()->after('price');
            $table->integer('price_art_paper')->nullable()->after('price_art_carton');
            $table->integer('price_art_hvs')->nullable()->after('price_art_paper');
            $table->integer('price_Doft')->nullable()->after('price_art_hvs');
            $table->integer('price_glossy')->nullable()->after('price_Doft');
            $table->integer('cutting_price')->nullable()->after('price_glossy');
            $table->text('description')->nullable()->after('cutting_price');
            $table->text('brief_description')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            //
        });
    }
};
