<?php

namespace Src\Shared\DAO\Usuario\Domain\Entity;

use Src\Shared\Kernel\ValueObjects\Main\UuidValue;


class Usuario
{
    public function __construct(
        private UuidValue $id,
        private ?string $name = null,
        private ?string $usuario = null,
        private ?string $apellidoPrimero = null,
        private ?string $apellidoSegundo = null,
        private ?string $email = null,
    )
        {
    }
    
    /**
     * Get the value of id
     */
    public function getId(): UuidValue
    {
            return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(UuidValue $id): self
    {
            $this->id = $id;

            return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
            return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
            $this->name = $name;

            return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario(): string
    {
            return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario(string $usuario): self
    {
            $this->usuario = $usuario;

            return $this;
    }

    /**
     * Get the value of apellidoPrimero
     */
    public function getApellidoPrimero(): string
    {
            return $this->apellidoPrimero;
    }

    /**
     * Set the value of apellidoPrimero
     */
    public function setApellidoPrimero(string $apellidoPrimero): self
    {
            $this->apellidoPrimero = $apellidoPrimero;

            return $this;
    }

    /**
     * Get the value of apellidoSegundo
     */
    public function getApellidoSegundo(): string
    {
            return $this->apellidoSegundo;
    }

    /**
     * Set the value of apellidoSegundo
     */
    public function setApellidoSegundo(string $apellidoSegundo): self
    {
            $this->apellidoSegundo = $apellidoSegundo;

            return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
            return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
            $this->email = $email;

            return $this;
    }
}
