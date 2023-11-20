<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'reference_id',
        'product_name',
        'quantity',
        'price',
        'ordered_datetime',
        'payment_method',
        'order_status',
        'dispatch_datetime',
        'dispatch_address',
        'user_id',
    ];
}
