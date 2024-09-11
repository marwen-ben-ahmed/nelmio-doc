<?php
namespace App\Controller;

use App\Dto\EmailRedirectAliasDto;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use OpenApi\Attributes as OA;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    #[Route('/api/data/add', name: 'api_data_post', methods: ['POST'])]
    #[OA\Post(
        summary: 'Create a new user',
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(ref: new Model(type: EmailRedirectAliasDto::class))
            )
        ),
        responses: [
            new OA\Response(
                response: '201',
                description: 'User created successfully',
                content: new OA\MediaType(
                    mediaType: 'application/json',
                    schema: new OA\Schema(ref: new Model(type: EmailRedirectAliasDto::class))
                )
            )
        ]
    )]
    public function addUser( Request $request): JsonResponse
    {
        dump($request->getContent());
        dump($request);

        return new JsonResponse(['status' => 'Data saved successfully']);
    }
}
