<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Thumb;

use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbFileNameParserInterface;
use Thiiagoms\Thumb\Entities\Youtube;

readonly class ThumbFileNameParser implements ThumbFileNameParserInterface
{
    public function parse(Youtube $youtube): string
    {
        return "{$youtube->code()}.jpg";
    }
}
