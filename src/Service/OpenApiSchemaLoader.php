<?php
namespace App\Service;

use Symfony\Component\Yaml\Yaml;

class OpenApiSchemaLoader
{
    private $schemas = [];

    public function __construct()
    {
        $this->loadSchemas();
    }

    private function loadSchemas()
    {
        $schemaFiles = glob(__DIR__ . '/../config/openapi/schemas/*.yaml');

        foreach ($schemaFiles as $file) {
            $parsedSchemas = Yaml::parseFile($file);
            $this->schemas = array_merge($this->schemas, $parsedSchemas);
        }
    }

    public function getSchemas()
    {
        return $this->schemas;
    }
}
