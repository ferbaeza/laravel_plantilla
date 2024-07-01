<?php

namespace Src\Auth\Infrastructure\Datasource;

use Illuminate\Support\Facades\Auth;
use Src\Auth\Application\LoginUsuarioCommand;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Auth\Domain\Aggregate\UsuarioLogeadoAggregate;
use Src\Auth\Domain\Interfaces\AuthUsuarioInterfaceRepository;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Laravel\Exceptions\Usuario\UserNoExisteException;

class AuthUsuarioRepository extends BaseRepository implements AuthUsuarioInterfaceRepository
{
    protected string $modelClass = UserModel::class;

    public function loginUsuario(LoginUsuarioCommand $command): UsuarioLogeadoAggregate
    {
        if (!Auth::attempt(['email' => $command->email, 'password' => $command->password])) {
            throw UserNoExisteException::drop($command->email);
        }
        $user = (Auth::user());
        $token = $user->createToken('token-name')->plainTextToken;
        return UsuarioLogeadoAggregate::fromRepo($user, $token);
    }
}
