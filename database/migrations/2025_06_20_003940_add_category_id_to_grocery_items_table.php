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
        Schema::table('grocery_items', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('bought');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grocery_items', function (Blueprint $table) {
            //
        });
    }
};
