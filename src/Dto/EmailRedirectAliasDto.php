<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class EmailRedirectAliasDto
{
    #[Assert\NotBlank]
    #[Assert\Email]
    public string $sDestination;

    public ?AutoReplyDto $oAutoReply;

    public ?array $oBlackListedAddresses = [];

    public ?PolicyDto $oPolicy;

    public ?array $oWhiteListedAddresses = [];

    #[Assert\NotBlank]
    #[Assert\Email]
    public string $sSource;

    public ?string $sRef = null;
}
