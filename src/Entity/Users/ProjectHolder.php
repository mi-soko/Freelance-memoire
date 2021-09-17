<?php

declare(strict_types=1);

namespace App\Entity\Users;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;


trait  ProjectHolder
{
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    #[NotBlank(groups: ['profile'])]
    protected ?string $address = null;

    /**
     * @ORM\Column(type="string",length=20,nullable=true)
     */
    #[NotBlank(groups: ['profile'])]
    protected ?string $phoneNumber = null;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    #[NotBlank(groups: ['profile'])]
    protected ?string $description = null;

}