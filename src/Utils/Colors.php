<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Utils;

enum Colors
{
    case GREEN;
    case RED;
    case YELLOW;

    public function color(): string
    {
        return match ($this) {
            Colors::GREEN => "\e[32m",
            Colors::RED => "\e[31m",
            Colors::YELLOW => "\e[33m"
        };
    }
}
