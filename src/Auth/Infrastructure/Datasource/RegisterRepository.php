<?php

namespace Src\Auth\Infrastructure\Datasource;

use Src\Auth\Domain\DTO\UrlRegistroDto;
use Src\Shared\Utils\Strings\StringUtil;
use Src\Shared\Repository\BaseRepository;
use Src\Auth\Application\InvitacionValidadaQuery;
use Src\Auth\Application\RegistrarUsuarioCommand;
use Src\Auth\Domain\DTO\InvitacionConfirmadadDto;
use Src\Auth\Domain\Interfaces\RegisterInterfaceRepository;
use Src\Shared\Exceptions\Auth\AuthTokenNoExisteException;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Shared\Dao\RegisterToken\Infrastructure\Eloquent\RegisterTokenModel;

class RegisterRepository extends BaseRepository implements RegisterInterfaceRepository
{
    protected string $modelClass = RegisterTokenModel::class;

    public function registrarUsuario(RegistrarUsuarioCommand $command): UrlRegistroDto
    {
        $model = new $this->modelClass();
        $model->id = UuidValue::id();
        $model->email = $command->email;
        $model->token = StringUtil::token();
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

        return InvitacionConfirmadadDto::create($model->email);
    }
}
