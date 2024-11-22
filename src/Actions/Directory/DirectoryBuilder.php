<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Directory;

use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryBuilderInterface;

readonly class DirectoryBuilder implements DirectoryBuilderInterface
{
    public function build(string $path): bool
    {
        return mkdir($path, 0777, true);
    }
}
