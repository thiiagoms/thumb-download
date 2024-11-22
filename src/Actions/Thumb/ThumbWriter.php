<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Thumb;

use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbWriterInterface;

readonly class ThumbWriter implements ThumbWriterInterface
{
    public function write(string $path, string $content): bool
    {
        return (bool) file_put_contents($path, $content);
    }
}
