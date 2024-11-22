<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Validators\URL\Fetch;

interface URLFetchInterface
{
    public function fetchUrl(string $url): bool;
}
