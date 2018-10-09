<?php

declare(strict_types=1);

namespace SocialNews\Submission\Domain;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class Submission
{
    private $id;
    private $url;
    private $title;
    private $creationDate;

    // Only the named constructor should be used
    private function __construct
    (
        UuidInterface       $id,
        string              $url,
        string              $title,
        DateTimeImmutable   $creationDate
    )
    {
        $this->id           = $id;
        $this->url          = $url;
        $this->title        = $title;
        $this->creationDate = $creationDate;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
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

    /**
     * @return DateTimeImmutable
     */
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    public static function submit(string $url, string $title): Submission
    {
        return new Submission(
            Uuid::uuid4(),
            $url,
            $title,
            new DateTimeImmutable()
        );
    }
}