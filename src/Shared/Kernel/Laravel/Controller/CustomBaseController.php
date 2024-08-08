<?php

namespace Src\Shared\Kernel\Laravel\Controller;

use App\Http\Controllers\Controller;
use Src\Shared\Kernel\ValueObjects\Main\ClassValue;
use Src\Shared\Kernel\ValueObjects\Main\FechaValue;

/** @phpstan-ignore-next-line */
class CustomBaseController extends Controller
{
    protected ClassValue $id;
    protected FechaValue $fecha;

    public function __construct()
    {
        $this->id = ClassValue::create();
        $this->fecha = FechaValue::create();
    }
}
