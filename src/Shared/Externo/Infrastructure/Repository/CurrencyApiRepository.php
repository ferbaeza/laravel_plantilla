<?php

namespace Src\Shared\Externo\Infrastructure\Repository;

use GuzzleHttp\Client;
use Src\Shared\Externo\Domain\Interfaces\CurrencyApiRepositoryInterface;


class CurrencyApiRepository implements CurrencyApiRepositoryInterface
{   

    public const COINAPI_TOKEN = 'F378A221-2692-4150-AE39-A744D9106A28';
    public const COINAPI_URL = 'https://api.coinapi.io/v1/exchanges/APIKEY-' . self::COINAPI_TOKEN ;
    public const API_URL = 'https://api.currencyapi.com/v3/latest';
    public const API_TOKEN = 'cur_live_BcSgjp5deB8ts2F0cdNQN3gD9IqA3jHZZ8C7WBCY';


    public function __construct(
        protected Client $client
    )
        {
    }
    public function getInfo()
    {
        $response = $this->client->get(self::COINAPI_URL);

        $data = json_decode($response->getBody()->getContents(), true);
        dd($data);

        $response = $this->client->get(self::API_URL, [
            'query' => [
                'apikey' => self::API_TOKEN
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        dd($data);
    }

}
