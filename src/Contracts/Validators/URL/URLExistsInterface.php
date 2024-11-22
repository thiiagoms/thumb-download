<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Validators\URL;

interface URLExistsInterface
{
    public function checkUrlExists(string $url): void;
}
