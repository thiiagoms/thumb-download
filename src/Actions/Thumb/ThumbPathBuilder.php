<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Thumb;

use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbFileNameParserInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbPathBuilderInterface;
use Thiiagoms\Thumb\Entities\Youtube;

readonly class ThumbPathBuilder implements ThumbPathBuilderInterface
{
    public function __construct(private ThumbFileNameParserInterface $fileNameParser) {}

    public function build(string $basePath, Youtube $youtube): string
    {
        $fileName = $this->fileNameParser->parse($youtube);

        return "{$basePath}/{$youtube->code()}/{$fileName}";
    }
}
