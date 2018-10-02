<?php

declare(strict_types=1);

namespace SocialNews\FrontPage\Application;

interface SubmissionQuery
{
    /**
     * @return Submission[]
     */
    public function execute(): array;
}