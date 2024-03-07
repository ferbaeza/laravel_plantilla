<?php

namespace Src\Auth\Application;

use Src\Auth\Application\InvitacionValidadaQuery;
use Src\Auth\Domain\Interfaces\RegisterInterfaceRepository;

class InvitacionValidadaQueryHandler
{
    public function __construct(
        protected RegisterInterfaceRepository $registerRepository
    ) {
    }

    public function run(InvitacionValidadaQuery $query)
    {
        return $this->registerRepository->invitacionValidada($query);
    }
}
