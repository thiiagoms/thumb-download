<?php

namespace Thiiagoms\Thumb\Contracts\Actions\Directory;

interface DirectoryCheckerInterface
{
    public function checkDirectoryExists(string $directory): bool;
}
