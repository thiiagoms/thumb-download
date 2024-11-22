<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Contracts\Validators\Youtube;

interface YoutubeURLIsValidInterface
{
    public function checkYoutubeUrlIsValid(string $url): void;
}
