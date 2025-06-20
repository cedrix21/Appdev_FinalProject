<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    protected $fillable = ['name', 'category_id', 'bought'];

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
