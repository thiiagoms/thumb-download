<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Directory;

use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryCheckerInterface;

readonly class DirectoryChecker implements DirectoryCheckerInterface
{
    public function checkDirectoryExists(string $directory): bool
    {
        return is_dir($directory);
    }
}
