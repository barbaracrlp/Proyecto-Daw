<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname1',
        'surname2',
        'username',
        'phone',
        // 'log_in',
        'is_designer',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_designer' => 'boolean',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {

        if ($panel->getId() === 'superAdmin') {
            return str_ends_with($this->email, '@admin.net');
        }

        return $this->attributes['is_designer']==true;

    }

    // public function designer():HasOne{
    //     return $this->hasOne(Designer::class,'user_id');
    // }

    // public function brand():HasOne{
    //     return $this->hasOne(Brand::class);
    // }

    public function designs():HasMany{
        return $this->hasMany(Design::class);
    }

}
