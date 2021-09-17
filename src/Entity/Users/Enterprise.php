<?php

namespace App\Entity\Users;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @ORM\Entity()
 */

#[
    ApiResource(
        itemOperations: [
            'GET' => [],
            'PATCH' => [
                'denormalization_context' => ['groups' => ['profile','Default']],
            ],
            'DELETE' => []
        ]
    )
]
class Enterprise extends ProjectHolder
{
    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    private ?string $enterpriseName;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    private ?string $legalStatus;

    public function getRoles():array
    {
        return ["Enterprise"];
    }
}