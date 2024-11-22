<?php

namespace Thiiagoms\Thumb\Contracts\Actions\Thumb;

use Thiiagoms\Thumb\Entities\Youtube;

interface ThumbManagerInterface
{
    public function buildThumb(string $path, string $content, Youtube $youtube): void;
}
