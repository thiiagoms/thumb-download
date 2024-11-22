<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Thumb;

interface ThumbWriterInterface
{
    public function write(string $path, string $content): bool;
}
