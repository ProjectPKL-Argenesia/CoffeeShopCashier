<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'type'];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'menu_id');
    }

    public function menuHistory()
    {
        return $this->hasMany(MenuHistory::class, 'menu_history_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('category_name', 'like', '%' . $search . '%')
            ->orWhere('type', 'like', '%' . $search . '%');
        });
    }
}
