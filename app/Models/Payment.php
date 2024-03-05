<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'cashier_id', 'order_id', 'date_payment', 'sub_total', 'tax', 'total', 'amount_paid', 'change', 'type_payment', 'discount'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function cashier()
    {
        return $this->belongsTo(Cashier::class, 'cashier_id');
    }
}
