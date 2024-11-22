<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Actions\Directory;

interface DirectoryBuilderInterface
{
    public function build(string $path): bool;
}
