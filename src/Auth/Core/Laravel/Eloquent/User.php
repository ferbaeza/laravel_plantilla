<?php

namespace Src\Auth\Core\Laravel\Eloquent;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use HasApiTokens;
    use HasUuids;


    protected string $guard_name = 'api';

    protected static function newFactory()
    {
        return UserFactory::new();
    }
    protected $fillable = [
        'id',
        'name',
        'apellido_primero',
        'apellido_segundo',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
