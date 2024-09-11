<?php

namespace App\Dto;
use Symfony\Component\Validator\Constraints as Assert;

class AutoReplyDto
{
    #[Assert\NotNull]
    public bool $bActive;

    public ?bool $bDateUsed = null;
    public ?bool $bReplyIfNotForMe = null;

    #[Assert\Range(min: 1)]
    public int $iMaxRepliesPerDestinationPerDay;

    #[Assert\Length(max: 255)]
    public ?string $sBody = '';

    public ?string $sEndDate = null;
    public ?string $sStartDate = null;

    #[Assert\Length(max: 255)]
    public string $sSubject;

    #[Assert\NotBlank]
    #[Assert\Email]
    public string $sOwner;
}