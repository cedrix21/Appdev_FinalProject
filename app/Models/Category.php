<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function groceryItems()
    {
        return $this->hasMany(GroceryItem::class);
    }
}
