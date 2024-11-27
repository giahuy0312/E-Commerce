<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'promotion_id',
        'order_date',
        'order_status',
        'order_total',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function promotions()
    {
        return $this->belongsTo(Promotion::class);
    }
}
