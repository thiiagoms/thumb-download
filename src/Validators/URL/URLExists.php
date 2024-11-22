<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Validators\URL;

use Thiiagoms\Thumb\Contracts\Validators\URL\Fetch\URLFetchInterface;
use Thiiagoms\Thumb\Contracts\Validators\URL\URLExistsInterface;
use Thiiagoms\Thumb\Contracts\Validators\URL\URLFormatInterface;
use Thiiagoms\Thumb\Exceptions\URL\URLNotFoundException;
use Thiiagoms\Thumb\Messages\URL\URLMessage;

readonly class URLExists implements URLExistsInterface
{
    public function __construct(
        private URLFormatInterface $urlFormat,
        private URLFetchInterface $urlFetch
    ) {}

    private function checkUrlResponseIsValid(string $url): void
    {
        $response = $this->urlFetch->fetchUrl($url);

        if ($response === false) {
            throw new URLNotFoundException(URLMessage::URL_DOES_NOT_EXISTS);
        }
    }

    public function checkUrlExists(string $url): void
    {
        $this->urlFormat->checkUrlFormatIsValid($url);

        $this->checkUrlResponseIsValid($url);
    }
}
