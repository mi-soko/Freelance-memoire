<?php

namespace App\Entity\Users;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Users\EnterpriseRepository")
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
class Enterprise extends User
{

    use ProjectHolder;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    private ?string $enterpriseName;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank(groups: ['profile'])]
    private ?string $legalStatus;

    public function getRoles():array
    {
        return ["Enterprise"];
    }

    /**
     * @return string|null
     */
    public function getEnterpriseName(): ?string
    {
        return $this->enterpriseName;
    }

    /**
     * @param string|null $enterpriseName
     */
    public function setEnterpriseName(?string $enterpriseName): void
    {
        $this->enterpriseName = $enterpriseName;
    }
}