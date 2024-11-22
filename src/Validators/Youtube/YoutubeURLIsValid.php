<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Validators\Youtube;

use Thiiagoms\Thumb\Contracts\Validators\URL\URLExistsInterface;
use Thiiagoms\Thumb\Contracts\Validators\Youtube\YoutubeURLIsValidInterface;
use Thiiagoms\Thumb\Exceptions\Youtube\YoutubeURLInvalidException;
use Thiiagoms\Thumb\Messages\Youtube\YoutubeMessage;

class YoutubeURLIsValid implements YoutubeURLIsValidInterface
{
    public function __construct(private readonly URLExistsInterface $urlExists) {}

    private function checkYoutubeURL(string $url): bool
    {
        $pattern = '/^https:\/\/www\.youtube\.com\/watch\?v=[a-zA-Z0-9_-]{11}$/';

        return (bool) preg_match($pattern, $url);
    }

    public function checkYoutubeUrlIsValid(string $url): void
    {
        $this->urlExists->checkUrlExists($url);

        $youtubeUrlIsValid = $this->checkYoutubeURL($url);

        if ($youtubeUrlIsValid === false) {
            throw new YoutubeURLInvalidException(YoutubeMessage::YOUTUBE_URL_IS_INVALID);
        }
    }
}
