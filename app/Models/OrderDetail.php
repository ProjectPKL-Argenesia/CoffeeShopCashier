<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['menu_name', 'order_id', 'qty', 'price', 'tax', 'total_price', 'discount'];
}
