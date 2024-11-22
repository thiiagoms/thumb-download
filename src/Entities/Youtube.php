<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Entities;

class Youtube
{
    public function __construct(private readonly string $url) {}

    public function url(): string
    {
        return $this->url;
    }

    public function code(): string
    {
        return explode('?v=', $this->url)[1];
    }
}
