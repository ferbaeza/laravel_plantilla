<?php

$backFiles = shell_exec('git diff --cached --name-only --diff-filter=ACM | grep ".php$\\|^composer.json$\\|^composer.lock$"');

if (!empty($backFiles)) {
    passthru('vendor/bin/githooks tool all', $gitHooksExit);

    if (0 !== $gitHooksExit) {
        exit(1);
    }

    passthru('vendor/bin/phpunit --exclude-group External', $phpunitExit);

    if (0 !== $phpunitExit) {
        echo "\n❌ \e[41m\e[30mSome tests failed\033[0m\n";
        exit(1);
    }
}