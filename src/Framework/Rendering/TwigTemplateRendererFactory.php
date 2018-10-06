<?php

declare(strict_types=1);

namespace SocialNews\Framework\Rendering;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Function;

use SocialNews\Framework\Csrf\StoredTokenReader;

final class TwigTemplateRendererFactory
{
    private $templateDirectory;

    public function __construct(TemplateDirectory $templateDirectory, StoredTokenReader $storedTokenReader)
    {
        $this->templateDirectory = $templateDirectory;
    }

    public function create(): TwigTemplateRenderer
    {
        $templateDirectory = $this->templateDirectory->tooString();
        $loader = new Twig_Loader_Filesystem([$templateDirectory]);
        $twigEnvironment = new Twig_Environment($loader);
        return new TwigTemplateRenderer($twigEnvironment);
    }
}