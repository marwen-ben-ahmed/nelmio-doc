<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints as Assert;

class MyControllerRequest
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    private string $name;

    #[Assert\NotBlank]
    #[Assert\Email]
    private string $email;

    #[Assert\NotBlank]
    #[Assert\Range(min: 18, max: 99)]
    private int $age;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }
}