<?php

declare(strict_types=1);

namespace SocialNews\FrontPage\Presentation;

use SocialNews\Framework\Rendering\TemplateRenderer;
use SocialNews\FrontPage\Application\SubmissionQuery;
use Symfony\Component\HttpFoundation\Response;

final class FrontPageController
{

    private $templateRenderer;
    private $submissionQuery;

    public function __construct
    (
        TemplateRenderer $templateRenderer,
        SubmissionQuery $submissionQuery
    )
    {
        $this->templateRenderer = $templateRenderer;
        $this->submissionQuery = $submissionQuery;
    }

    public function show(): Response
    {

        $content = $this->templateRenderer->render('FrontPage.html.twig', [
            'submissions' => $this->submissionQuery->execute(),
        ]);

        return new Response($content);
    }
}
