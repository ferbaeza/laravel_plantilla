<?php

namespace Src\Shared\Laravel\Model;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomModel extends Model
{
    protected $table;

    use HasUuids;
    use HasApiTokens;
    use HasFactory;

}
