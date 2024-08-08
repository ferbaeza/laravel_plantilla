<?php

namespace Src\Shared\Kernel\ValueObjects\Main;

use Carbon\Carbon;
use Src\Shared\Kernel\ValueObjects\Interfaces\Value;
use Src\Shared\Kernel\ValueObjects\Base\CustomBaseValueObject;
use Src\Shared\Kernel\Exceptions\ValueObjects\FechaInvalidaException;

class FechaValue extends CustomBaseValueObject implements Value
{
    private Carbon $carbon;

    public function __construct(
        private readonly string $fecha
    ) {
        try {
            $this->carbon = new Carbon($fecha);

        } catch (\Throwable $th) {
            throw FechaInvalidaException::drop($fecha);
        }
    }

    public static function create(): self
    {
        return self::hoy();
    }

    public function value(): mixed
    {
        return $this->carbon;
    }

    public function dia(): string
    {
        return $this->carbon->format('Y-m-d');
    }

    public static function ayer(): self
    {
        $ayer = Carbon::yesterday()->format('Y-m-d');
        return new self($ayer);
    }
    public static function ahora(): self
    {
        $hoy = Carbon::now()->format('Y-m-d H:i:s');
        return new self($hoy);
    }

    public static function hoy(): self
    {
        $hoy = Carbon::now()->format('Y-m-d');
        return new self($hoy);
    }

    public static function tomorrow(): self
    {
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        return new self($tomorrow);
    }

    public function retrocederDias(int $dias): self
    {
        $carbon = new Carbon($this->fecha);
        $fecha = $carbon->subDays($dias)->format('Y-m-d H:i:s');
        return new self($fecha);
    }

    public function addDays(int $dias): self
    {
        $carbon = new Carbon($this->fecha);
        $fecha = $carbon->addDays($dias)->format('Y-m-d H:i:s');
        return new self($fecha);
    }

    public function anyadirHoras(int $horas): self
    {
        $carbon = new Carbon($this->fecha);
        $fecha  = $carbon->addHours($horas)->format('Y-m-d H:i:s');
        return new self($fecha);
    }

    public function restarHoras(int $horas): self
    {
        $carbon = new Carbon($this->fecha);
        $fecha  = $carbon->subHours($horas)->format('Y-m-d H:i:s');
        return new self($fecha);
    }
    public function restarMinutos(int $horas): self
    {
        $carbon = new Carbon($this->fecha);
        $fecha  = $carbon->subMinutes($horas)->format('Y-m-d H:i:s');
        return new self($fecha);
    }

    public function restarSegundos(int $segundos): self
    {
        $carbon = new Carbon($this->fecha);
        $fecha  = $carbon->subSeconds($segundos)->format('Y-m-d H:i:s');
        return new self($fecha);
    }

    public function __toString(): string
    {
        return $this->carbon->toIso8601String();
    }

}
