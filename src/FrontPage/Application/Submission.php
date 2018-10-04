<?php

declare(strict_types=1);

namespace SocialNews\FrontPage\Application;

final class Submission
{
    private $url;
    private $title;

    public function __construct
    (
        string $url,
        string $title
    )
    {
        $this->url = $url;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


}