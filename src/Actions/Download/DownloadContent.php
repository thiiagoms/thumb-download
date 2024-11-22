<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Download;

use Thiiagoms\Thumb\Contracts\Actions\Download\DownloadContentInterface;

readonly class DownloadContent implements DownloadContentInterface
{
    public function get(string $url): string
    {
        return file_get_contents($url);
    }
}
