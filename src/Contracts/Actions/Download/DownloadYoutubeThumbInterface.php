<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Download;

use Thiiagoms\Thumb\Entities\Youtube;

interface DownloadYoutubeThumbInterface
{
    public function downloadThumb(Youtube $youtube): string;
}
