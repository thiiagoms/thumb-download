<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Validators\URL;

use Thiiagoms\Thumb\Contracts\Validators\URL\URLFormatInterface;
use Thiiagoms\Thumb\Exceptions\URL\URLInvalidFormatException;
use Thiiagoms\Thumb\Messages\URL\URLMessage;

readonly class URLFormat implements URLFormatInterface
{
    public function checkUrlFormatIsValid(string $url): void
    {
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new URLInvalidFormatException(URLMessage::URL_FORMAT_IS_INVALID);
        }
    }
}
