<?php
namespace App\Dto;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TestDto', // The reference name for this schema
    type: 'object',
    properties: [
        new OA\Property(property: 'test11', type: 'string', example: 'val11'),
        new OA\Property(property: 'test12', type: 'string', example: 'val12'),
        new OA\Property(property: 'test14', ref: '#/components/schemas/Test14Dto')
    ],
    required: ['test11', 'test12']
)]
class TestDto
{
    public string $test11;
    public string $test12;
    public Test14Dto $test14;
}
