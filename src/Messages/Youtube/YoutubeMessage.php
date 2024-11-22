<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Messages\Youtube;

abstract class YoutubeMessage
{
    private function __construct() {}

    public const string YOUTUBE_URL_IS_INVALID = 'The provided URL is invalid. Please ensure it follows the correct YouTube URL format';
}
