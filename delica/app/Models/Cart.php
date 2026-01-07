<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    // Belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Has many cart items
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
