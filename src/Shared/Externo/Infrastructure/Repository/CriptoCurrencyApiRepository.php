<?php

namespace Src\Shared\Externo\Infrastructure\Repository;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Src\Shared\Externo\Domain\Interfaces\CurrencyApiRepositoryInterface;


class CriptoCurrencyApiRepository implements CurrencyApiRepositoryInterface
{   
    public const COINAPI_TOKEN = '/APIKEY-F378A221-2692-4150-AE39-A744D9106A28';
    public const COINAPI_URL = 'https://api.coinapi.io/v1/exchanges';

    public function __construct(
        protected Client $client
    )
        {
    }
    public function getInfo()
    {
        dd(22);
        $response = $this->client->get(self::COINAPI_URL . self::COINAPI_TOKEN);

        $data = json_decode($response->getBody()->getContents(), true);
        // File::put('public/cripto.json', json_encode($data));
        return $data;
    }

}
