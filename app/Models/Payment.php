<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'cashier_id', 'order_id', 'date_payment', 'total_price', 'type_payment', 'discount'];
}
