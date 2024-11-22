<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Youtube;

use Thiiagoms\Thumb\Contracts\Actions\Youtube\YoutubeThumbnailBuilderInterface;
use Thiiagoms\Thumb\Entities\Youtube;

readonly class YoutubeThumbnailBuilder implements YoutubeThumbnailBuilderInterface
{
    public function buildYoutubeThumb(Youtube $youtube): string
    {
        return "https://img.youtube.com/vi/{$youtube->code()}/maxresdefault.jpg";
    }
}
