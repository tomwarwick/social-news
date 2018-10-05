<?php

declare(strict_types=1);

use Auryn\Injector;

use SocialNews\Framework\Rendering\TemplateRenderer;
use SocialNews\Framework\Rendering\TwigTemplateRendererFactory;
use SocialNews\Framework\Rendering\TemplateDirectory;

use SocialNews\FrontPage\Application\SubmissionQuery;
use SocialNews\FrontPage\Infrastructure\DbalSubmissionQuery;

use Doctrine\DBAL\Connection;
use SocialNews\Framework\Dbal\ConnectionFactory;
use SocialNews\Framework\Dbal\DatabaseUrl;

$injector = new Injector();

$injector->delegate(
  TemplateRenderer::class,
  function () use ($injector): TemplateRenderer {
      $factory = $injector->make(TwigTemplateRendererFactory::class);
      return $factory->create();
  }
);

$injector->define(TemplateDirectory::class, [':rootDirectory' => ROOT_DIR]);

$injector->alias(SubmissionQuery::class, DbalSubmissionQuery::class);

$injector->share(SubmissionQuery::class);

$injector->define(
    DatabaseUrl::class,
    [':url' => 'sqlite:///' . ROOT_DIR . '/storage/db.sqlite3']
);

$injector->delegate(Connection::class, function () use ($injector): connection
    {
        $factory = $injector->make(ConnectionFactory::class);
        return $factory->create();
    });

$injector->share(Connection::class);


return $injector;
