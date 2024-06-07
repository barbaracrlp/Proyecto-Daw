<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'totalPrice',
        'state',
    ];

    public function cartItems():HasMany
    {
        return $this->hasMany(CartItem::class);
    }


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);

    }

    public function updateTotal(){
        $total=$this->cartItems()->sum('total');
        $this->totalPrice=$total;
        $this->save();
    }
}
