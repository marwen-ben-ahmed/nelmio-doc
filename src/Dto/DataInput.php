<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class DataInput
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    public string $title;

    #[Assert\NotBlank]
    public string $content;
}
