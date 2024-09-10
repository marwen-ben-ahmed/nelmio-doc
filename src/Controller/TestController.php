<?php
namespace App\Controller;

use App\Dto\UserDto; // Ensure this is correct
use OpenApi\Attributes as OA;

class TestController
{
    private $schemaLoader;

    public function __construct(OpenApiSchemaLoader $schemaLoader)
    {
        $this->schemaLoader = $schemaLoader;
    }

    
    #[Route('/api/users', name: 'create_user', methods: ['POST'])]
    #[OA\Post(
        summary: 'Create a new user',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(ref: '#/components/schemas/UserDto')
            )
        ),
        responses: [
            new OA\Response(
                response: '201',
                description: 'User created successfully',
                content: new OA\MediaType(
                    mediaType: 'application/json',
                    schema: new OA\Schema(ref: '#/components/schemas/UserDto')
                )
            )
        ]
    )]
    public function createUser()
    {
        // Controller logic
    }
}
