<?php

namespace Tests\Src\Shared\Infrastructure\Repository;

use Src\Shared\Externo\Domain\Interfaces\CurrencyApiRepositoryInterface;


class CriptoCurrencyApiFakeRepository implements CurrencyApiRepositoryInterface
{
    public function getInfo()
    {
        $file = file_get_contents('public/cripto.json');
        $data = json_decode($file, true);
        return $data;
    }
}
