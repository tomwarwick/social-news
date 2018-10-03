<?php

declare(strict_types=1);

namespace SocialNews\Framework\Dbal;

final class DatabaseUrl
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function tooString(): string
    {
        return $this->url;
    }

}