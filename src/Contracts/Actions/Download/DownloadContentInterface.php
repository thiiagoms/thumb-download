<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Download;

interface DownloadContentInterface
{
    public function get(string $url): string;
}
