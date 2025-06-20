<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            DB::statement("ALTER TABLE categories MODIFY name ENUM('Dairy', 'Produce', 'Bakery', 'Meat', 'Grains', 'Beverages', 'Household') UNIQUE");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE categories MODIFY name VARCHAR(255) UNIQUE");
    }
};
