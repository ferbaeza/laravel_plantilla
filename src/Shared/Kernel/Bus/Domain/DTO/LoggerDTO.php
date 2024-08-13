<?php

namespace Src\Shared\Kernel\Bus\Domain\DTO;

final readonly class LoggerDTO
{
    public function __construct(
        public string $url,
        public string $route,
        public string $urlMethod,
        public string $userId,
        public UserLoggerDTO $user,
        public string $useCase,
        public string $useCaseId,
        public string $useCaseFecha,
    )
        {
    }

}
