<?php

declare(strict_types=1);

namespace SocialNews\FrontPage\Infrastructure;

use SocialNews\FrontPage\Application\Submission;
use SocialNews\FrontPage\Application\SubmissionQuery;

final class MockSubmissionQuery implements SubmissionQuery
{
    private $submission;

    public function __construct()
    {
        $this->submission = [
          new Submission('www.bing.com','Bing'),
          new Submission('www.excite.com','excite'),
          new Submission('www.lycos,com','Lycos'),
        ];
    }

    public function execute(): array
    {
        return $this->submission;
    }
}