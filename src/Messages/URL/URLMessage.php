<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Messages\URL;

abstract class URLMessage
{
    private function __construct() {}

    public const string URL_FORMAT_IS_INVALID = "Invalid URL format. Use 'http://' or 'https://'";

    public const string URL_DOES_NOT_EXISTS = 'The URL does not exist or is unreachable.';
}
