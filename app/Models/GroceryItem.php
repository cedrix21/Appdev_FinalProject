<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroceryItem extends Model
{
    protected $fillable = ['name', 'category', 'bought'];

}
