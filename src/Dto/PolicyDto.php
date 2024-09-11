<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class PolicyDto
{
    #[Assert\NotNull]
    public bool $bAntiSpamActive;

    #[Assert\NotNull]
    public bool $bAntivirusActive;

    public ?bool $bBadHeaderAccepted = null;
    public ?bool $bBadHeaderReceiptWarned = null;
    public ?bool $bBannedAttachmentAccepted = null;
    public ?bool $bBannedAttachmentReceiptWarned = null;
    public ?bool $bCheckBannedAttachmentActive = null;
    public ?bool $bCheckHeadersActive = null;
    public ?bool $bSpamAccepted = null;
    public ?bool $bSpamSubjectModified = null;
    public ?bool $bVirusAccepted = null;
    public ?bool $bVirusReceiptWarned = null;

    #[Assert\Range(min: 1, max: 100)]
    public float $fSpamDsnDisabledMinimumScore;

    #[Assert\Range(min: 0, max: 10)]
    public float $fSpamLevel;

    #[Assert\Range(min: 0, max: 10)]
    public float $fSpamTagLevel;

    #[Assert\Range(min: 0, max: 10)]
    public float $fSpamTagLevel2;

    #[Assert\Range(min: 1)]
    public int $iMaxMessageSize;

    #[Assert\Length(max: 255)]
    public ?string $sBadHeadersDestination = '';

    #[Assert\Length(max: 255)]
    public ?string $sBadHeadersQuarantine = 'bad-header-quarantine';

    #[Assert\Length(max: 255)]
    public ?string $sBannedAttachmentDestination = '';

    #[Assert\Length(max: 255)]
    public ?string $sBannedAttachmentQuarantine = 'banned-quarantine';

    #[Assert\Length(max: 255)]
    public ?string $sSpamDestination = '';

    #[Assert\Length(max: 255)]
    public ?string $sSpamNotifyDestination = '';

    #[Assert\Length(max: 255)]
    public ?string $sSpamQuarantine = 'spam-quarantine';

    #[Assert\Length(max: 255)]
    public ?string $sSpamSubjectTag = '';

    #[Assert\Length(max: 255)]
    public ?string $sSpamSubjectTag2 = ':-((';

    #[Assert\Length(max: 255)]
    public ?string $sVirusDestination = '';

    #[Assert\Length(max: 255)]
    public ?string $sVirusNotifyDestination = '';

    #[Assert\Length(max: 255)]
    public ?string $sVirusQuarantine = 'virus-quarantine';

    #[Assert\Length(max: 255)]
    public ?string $sName = '';
}
