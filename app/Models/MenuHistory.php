<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuHistory extends Model
{
    use HasFactory;

    protected $fillable = ['menu_category_id', 'type', 'menu_name', 'price', 'image', 'stock', 'tax'];

    public function menu_category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }
}
