<?php

namespace Src\Custom\Application;

use Src\Shared\Laravel\Command\BaseCommand;

class JobCommand extends BaseCommand
{
    public function __construct(
        public ?string $id
    ) {
        parent::__construct();
    }
}
