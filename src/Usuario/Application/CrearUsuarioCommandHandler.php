<?php

namespace Src\Usuario\Application;

use Src\Shared\Criteria\Criteria;
use Illuminate\Support\Facades\Hash;
use Src\Usuario\Domain\Entity\UsuarioNuevoEntity;
use Src\Usuario\Domain\Interfaces\UsuarioInterfaceRepository;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Shared\Dao\User\Domain\Interfaces\UsuarioDaoInterfaceRepository;
use Src\Shared\Laravel\Exceptions\Usuario\UsuarioEmailYaExisteException;


final class CrearUsuarioCommandHandler
{
    public function __construct(
        protected readonly UsuarioInterfaceRepository $usuarioRepository,
        protected readonly UsuarioDaoInterfaceRepository $daoRepository
    ) {
    }

    public function run(CrearUsuarioCommand $command)
    {
        try {
            $this->existeUsuarioConEsteEmail(email: $command->email);


            $usuarioEntity = new UsuarioNuevoEntity(
                id : UuidValue::create(),
                email : $command->email,
                nombre : $command->nombre,
                primerApellido : $command->primerApellido,
                segundoApellido : $command->segundoApellido,
                password : Hash::make($command->password),

            );
            $this->usuarioRepository->crearUsuario(usuario: $usuarioEntity);

            return $usuarioEntity;
            

        } catch (UsuarioEmailYaExisteException $e) {
            throw $e;
        }
    }
    
    private function existeUsuarioConEsteEmail(string $email)
    {
        $criteria = new Criteria();
        $criteria->where('email', $email);
    
        $usuario = $this->daoRepository->getCollection($criteria);

        if ($usuario->count() > 0) {
            throw UsuarioEmailYaExisteException::drop($email);
        }
    }
}
