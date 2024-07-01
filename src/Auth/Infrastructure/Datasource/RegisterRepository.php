<?php

namespace Src\Auth\Infrastructure\Datasource;

use Src\Auth\Domain\DTO\UrlRegistroDto;
use Src\Shared\Utils\Strings\StringsUtil;
use Src\Auth\Application\InvitacionValidadaQuery;
use Src\Auth\Application\RegistrarUsuarioCommand;
use Src\Auth\Domain\DTO\InvitacionConfirmadadDto;
use Src\Shared\Laravel\Repository\BaseRepository;
use Src\Auth\Domain\Interfaces\RegisterInterfaceRepository;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Shared\Laravel\Exceptions\Auth\AuthTokenNoExisteException;
use Src\Shared\Dao\RegisterToken\Infrastructure\Eloquent\RegisterTokenModel;
use Src\Shared\Laravel\Exceptions\Usuario\EmailUsuarioYaVerificadoException;

class RegisterRepository extends BaseRepository implements RegisterInterfaceRepository
{
    protected string $modelClass = RegisterTokenModel::class;


    public function count(RegistrarUsuarioCommand $command): bool
    {
        $model = $this->modelClass::where('email', $command->email)->first();
        if ($model) {
            throw EmailUsuarioYaVerificadoException::create();
        }
        return false;
    }

    public function registrarUsuario(RegistrarUsuarioCommand $command): UrlRegistroDto
    {
        $model = new $this->modelClass();
        $model->id = UuidValue::id();
        $model->email = $command->email;
        $model->token = StringsUtil::token();
        $model->save();
        return UrlRegistroDto::create($model->token);
    }

    public function invitacionValidada(InvitacionValidadaQuery $query): InvitacionConfirmadadDto
    {
        $model = $this->modelClass::where('token', $query->token)->first();
        if (!$model) {
            throw AuthTokenNoExisteException::create();
        }
        $model->email_verified = true;
        $model->save();

        return new InvitacionConfirmadadDto(estado: true, email: $model->email);
    }
}
