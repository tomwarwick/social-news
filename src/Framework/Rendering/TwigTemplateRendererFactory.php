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

    public function __construct
    (
        TemplateDirectory $templateDirectory,
        StoredTokenReader $storedTokenReader
    )
    {
        $this->templateDirectory = $templateDirectory;
        $this->storedTokenReader = $storedTokenReader;

    }

    public function create(): TwigTemplateRenderer
    {
        $loader = new Twig_Loader_Filesystem([
           $this->templateDirectory->tooString(),
        ]);
        $twigEnvironment = new Twig_Environment($loader);

        $twigEnvironment->addFunction(
            new Twig_Function('get_token', function (string $key): string {
                $token = $this->storedTokenReader->read($key);
                return $token->toString();
            })
        );

        return new TwigTemplateRenderer($twigEnvironment);
    }
}