<?php

namespace Tests\Src\Shared\Infrastructure\Repository;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;



class CurrenciApiTest extends TestCase
{
    private CriptoCurrencyApiFakeRepository $currencyApiRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->currencyApiRepository = $this->app->make(CriptoCurrencyApiFakeRepository::class);
    }

    #[Test]
    public function deberia_devolver_algo_la_llamada_a_la_api()
    {
        $response = $this->currencyApiRepository->getInfo();
        $this->assertIsArray($response);
    }
}
