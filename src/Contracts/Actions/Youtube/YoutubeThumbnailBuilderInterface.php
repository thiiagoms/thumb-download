<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Youtube;

use Thiiagoms\Thumb\Entities\Youtube;

interface YoutubeThumbnailBuilderInterface
{
    public function buildYoutubeThumb(Youtube $youtube): string;
}
