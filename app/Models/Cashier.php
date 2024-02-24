<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'gender'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'payment_id');
    }
}
