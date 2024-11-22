<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Thumb;

use Thiiagoms\Thumb\Entities\Youtube;

interface ThumbFileNameParserInterface
{
    public function parse(Youtube $youtube): string;
}
