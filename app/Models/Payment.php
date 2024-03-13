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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('type_payment', 'like', '%' . $search . '%')
                    ->orWhere('date_payment', 'like', '%' . $search . '%')
                    ->orWhere('sub_total', 'like', '%' . $search . '%')
                    ->orWhere('tax', 'like', '%' . $search . '%')
                    ->orWhere('total', 'like', '%' . $search . '%')
                    ->orWhere('amount_paid', 'like', '%' . $search . '%')
                    ->orWhere('change', 'like', '%' . $search . '%')
                    ->orWhere('discount', 'like', '%' . $search . '%')
                    ->orWhereHas('order', function ($query) use ($search) {
                        $query->whereHas('table', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%')
                                ->orWhere('status', 'like', '%' . $search . '%');
                        })
                            ->orWhere('no_receipt', 'like', '%' . $search . '%')
                            ->orWhereHas('orderDetails', function ($query) use ($search) {
                                $query->where('menu_name', 'like', '%' . $search . '%')
                                    ->orWhere('qty', 'like', '%' . $search . '%')
                                    ->orWhere('price', 'like', '%' . $search . '%')
                                    ->orWhere('tax', 'like', '%' . $search . '%')
                                    ->orWhere('total_price', 'like', '%' . $search . '%')
                                    ->orWhere('discount', 'like', '%' . $search . '%');
                            });
                    })
                    ->orWhereHas('store', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('address', 'like', '%' . $search . '%')
                            ->orWhere('phone_number', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('cashier', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('gender', 'like', '%' . $search . '%');
                    });
            });
        });
    }
}
