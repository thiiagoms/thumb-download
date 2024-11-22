<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Directory;

interface DirectoryManagerInterface
{
    public function createDirectory(string $directory): void;
}
