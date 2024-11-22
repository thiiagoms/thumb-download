<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Validators\URL;

interface URLFormatInterface
{
    public function checkUrlFormatIsValid(string $url): void;
}
