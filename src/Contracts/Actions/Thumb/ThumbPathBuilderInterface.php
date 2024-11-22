<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Thumb;

use Thiiagoms\Thumb\Entities\Youtube;

interface ThumbPathBuilderInterface
{
    public function build(string $basePath, Youtube $youtube): string;
}
