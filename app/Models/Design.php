<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Design extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'stock',
        'expiration',
        'price',
        'collection_id',
        'user_id',
        'type_id',
        'file_path',
    ];

    //a partir de aqui creo las relaciones

    public function user():BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

    //falta el modelo
    public function type():BelongsTo{
        return $this->belongsTo(Type::class);
    }

    public function collection():BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class,);
    }

}
