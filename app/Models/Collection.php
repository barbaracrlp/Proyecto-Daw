<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'designer_id',
        'price',
        'user_id',
    ];

    public function designs():HasMany
    {
        return $this->hasMany(Design::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
