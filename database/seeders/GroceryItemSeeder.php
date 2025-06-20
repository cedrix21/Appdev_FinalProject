<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroceryItem;
use App\Models\Category;

use function PHPUnit\Framework\assertFalse;

class GroceryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Milk', 'category' => 'Dairy', 'bought' => false],
            ['name' => 'Eggs', 'category' => 'Dairy', 'bought' => false],
            ['name' => 'Bread', 'category' => 'Bakery', 'bought' => false],
            ['name' => 'Apples', 'category' => 'Produce', 'bought' => false],
            ['name' => 'Chicken Breast', 'category' => 'Meat', 'bought' => false],
            ['name' => 'Rice', 'category' => 'Grains', 'bought' => false],
            ['name' => 'Carrots', 'category' => 'Produce', 'bought' => false],
            ['name' => 'Cheese', 'category' => 'Dairy', 'bought' => false],
            ['name' => 'Coffee', 'category' => 'Beverages', 'bought' => false],
            ['name' => 'Toilet Paper', 'category' => 'Household', 'bought' => false],
        ];

        foreach ($items as $item) {
        $category = Category::where('name', $item['category'])->first();
        if ($category) {
            GroceryItem::create([
                'name' => $item['name'],
                'category_id' => $category->id,
                'bought' => $item['bought'],
            ]);
        }
    }
    }

}
