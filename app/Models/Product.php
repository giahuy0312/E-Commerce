<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'material',
        'image',
        'category_id',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function wishlist()
    {
        return $this->belongsToMany(Wishlist::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
