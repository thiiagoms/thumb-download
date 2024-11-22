<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Validators\URl\Fetch;

use Thiiagoms\Thumb\Contracts\Validators\URL\Fetch\URLFetchInterface;

class URLFetch implements URLFetchInterface
{
    public function fetchUrl(string $url): bool
    {
        return (bool) @get_headers($url, true);
    }
}
