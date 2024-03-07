<?php

namespace Src\Shared\Dao\RegisterToken\Infrastructure\Eloquent;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisterTokenModel extends Model
{
    use HasUuids;
    use HasApiTokens;
    use HasFactory;

    protected $table = 'password_register_token';
}
