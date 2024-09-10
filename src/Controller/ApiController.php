<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

class ApiController extends AbstractController
{
    #[Route('/api/data/add', name: 'api_data_post', methods: ['POST'])]
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
    public function addUser(Request $request): JsonResponse
    {
        dump($request->getContent());
        dump($request);

        // Deserialize request into DTO
        /* $dataInput = $serializer->deserialize($request->getContent(), UserDto::class, 'json');

        dump($request->getContent());
        // Validate the DTO
        $errors = $validator->validate($dataInput);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], 400);
        }*/

        // Business logic: save data, etc.
        return new JsonResponse(['status' => 'Data saved successfully']);
    }

    #[Route('/data/get', name: 'api_index', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Welcome to the API',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'message', type: 'string')
            ]
        )
    )]
    public function index(): JsonResponse
    {
        return new JsonResponse(['message' => 'Welcome to the API!']);
    }
}
