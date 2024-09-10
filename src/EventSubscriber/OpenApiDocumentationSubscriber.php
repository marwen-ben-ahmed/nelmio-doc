<?php
namespace App\EventSubscriber;

use App\Service\OpenApiSchemaLoader;
use Twig\TwigEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;

class OpenApiDocumentationSubscriber implements EventSubscriberInterface
{
    private $schemaLoader;
    private $logger;

    public function __construct(OpenApiSchemaLoader $schemaLoader, LoggerInterface $logger)
    {
        $this->schemaLoader = $schemaLoader;
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            TwigEvents::LOAD => 'onDocumentationEvent'
        ];
    }

    public function onDocumentationEvent(DocumentationEvent $event)
    {
        dump(1111);

        $openApiSpec = $event->getDocumentation();

        $schemas = $this->schemaLoader->getSchemas();
        $this->logger->info('Loaded schemas', ['schemas' => $schemas]);

        // Merge custom schemas into the OpenAPI specification
        $openApiSpec['components']['schemas'] = array_merge(
            $openApiSpec['components']['schemas'] ?? [],
            $schemas
        );

        $this->logger->info('Updated OpenAPI specification', ['spec' => $openApiSpec]);

        $event->setDocumentation($openApiSpec);
    }
}
