<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Download;

use Thiiagoms\Thumb\Contracts\Actions\Download\DownloadContentInterface;
use Thiiagoms\Thumb\Contracts\Actions\Download\DownloadYoutubeThumbInterface;
use Thiiagoms\Thumb\Contracts\Actions\Youtube\YoutubeThumbnailBuilderInterface;
use Thiiagoms\Thumb\Entities\Youtube;

readonly class DownloadYoutubeThumb implements DownloadYoutubeThumbInterface
{
    public function __construct(
        private YoutubeThumbnailBuilderInterface $thumbnailBuilder,
        private DownloadContentInterface $downloadContent

    ) {}

    public function downloadThumb(Youtube $youtube): string
    {
        $thumb = $this->thumbnailBuilder->buildYoutubeThumb($youtube);

        return $this->downloadContent->get($thumb);
    }
}
