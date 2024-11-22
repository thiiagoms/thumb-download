<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Thumb;

use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbManagerInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbPathBuilderInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbWriterInterface;
use Thiiagoms\Thumb\Entities\Youtube;

readonly class ThumbManager implements ThumbManagerInterface
{
    public function __construct(
        private ThumbPathBuilderInterface $pathBuilder,
        private ThumbWriterInterface $thumbWriter,
    ) {}

    public function buildThumb(string $path, string $content, Youtube $youtube): void
    {
        $path = $this->pathBuilder->build($path, $youtube);

        $this->thumbWriter->write($path, $content);
    }
}
