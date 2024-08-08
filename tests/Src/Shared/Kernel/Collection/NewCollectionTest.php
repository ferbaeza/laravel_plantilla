<?php

namespace Tests\Src\Shared\Kernel\Collection;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use stdClass;

class NewCollectionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function it_should_return_a_new_collection()
    {
        $collection = new UsuarioCollection();
        $this->assertInstanceOf(UsuarioCollection::class, $collection);
    }

    #[Test]
    public function it_should_return_a_new_collection_with_entity()
    {
        $collection = new UsuarioCollection();

        $usuarioFer = new Usuario('Fer', 'fer@mail.lcom', 30);
        $usuarioNando = new Usuario('Nando', 'nando@mail.lcom', 9);
        $usuarioVic = new Usuario('Vic', 'vic@mail.lcom', 30);

        $collection->add($usuarioFer);
        $collection->add($usuarioNando);
        $collection->add($usuarioVic);

        // dd($collection->groupBy('edad'));

        $this->assertInstanceOf(Usuario::class, $usuarioFer);
        $this->assertInstanceOf(UsuarioCollection::class, $collection);
    }

    #[Test]
    public function it_should_return_a_new_exception()
    {
        $this->expectException(\InvalidArgumentException::class);
        $collection = new UsuarioCollection();

        $usuarioFer = new Usuario('Fer', 'fer@mail.lcom', 30);
        $usuarioVic = new stdClass('Vic', 'vic@mail.lcom', 30);

        $collection->add($usuarioFer);
        $collection->add($usuarioVic);
    }
}
