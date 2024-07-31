<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'note',
        'payment_method',
        'status',
        'total'
    ];

    public function Order_items()
    {
        return $this->hasMany(Order_item::class);
    }
}
