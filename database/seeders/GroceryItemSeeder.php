<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroceryItem;

class GroceryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroceryItem::insert([
            ['name' => 'Milk', 'category' => 'Dairy', 'bought' => false],
            ['name' => 'Eggs', 'category' => 'Dairy', 'bought' => true],
            ['name' => 'Bread', 'category' => 'Bakery', 'bought' => false],
            ['name' => 'Apples', 'category' => 'Produce', 'bought' => false],
            ['name' => 'Chicken Breast', 'category' => 'Meat', 'bought' => true],
            ['name' => 'Rice', 'category' => 'Grains', 'bought' => false],
            ['name' => 'Carrots', 'category' => 'Produce', 'bought' => false],
            ['name' => 'Cheese', 'category' => 'Dairy', 'bought' => false],
            ['name' => 'Coffee', 'category' => 'Beverages', 'bought' => false],
            ['name' => 'Toilet Paper', 'category' => 'Household', 'bought' => true],
        ]);
    }
}
