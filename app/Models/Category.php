<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    public function designs():BelongsToMany
    {
        return $this->belongsToMany(Design::class, 'category_design');
    }
}
