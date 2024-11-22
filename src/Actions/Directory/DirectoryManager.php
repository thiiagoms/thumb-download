<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Actions\Directory;

use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryBuilderInterface;
use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryCheckerInterface;
use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryManagerInterface;
use Thiiagoms\Thumb\Utils\Printer;

readonly class DirectoryManager implements DirectoryManagerInterface
{
    public function __construct(
        private DirectoryCheckerInterface $directoryChecker,
        private DirectoryBuilderInterface $directoryBuilder
    ) {}

    public function createDirectory(string $directory): void
    {
        try {

            $directoryExists = $this->directoryChecker->checkDirectoryExists($directory);

            if ($directoryExists === false) {
                $this->directoryBuilder->build($directory);
            }

        } catch (\Exception $e) {
            Printer::error("Error: {$e->getMessage()}");
            exit;
        }
    }
}
