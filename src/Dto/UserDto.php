<?php
namespace App\Dto;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'UserDto',
    type: 'object',
    properties: [
        new OA\Property(property: 'name', type: 'string', example: 'John Doe'),
        new OA\Property(property: 'age', type: 'integer', example: 30),
        new OA\Property(property: 'type', type: 'integer', example: 1)
    ],
    required: ['name', 'age', 'type']
)]
class UserDto
{
    public string $name;
    public int $age;
    public int $type;
}
