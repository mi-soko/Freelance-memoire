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
            'DELETE' => [],
            'PUT' => []
        ],
        collectionOperations: [
            "POST" => [
                'validation_groups' => ['create:user']
            ]
        ],
    )
]
class Enterprise extends User
{

    use ProjectHolder;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank(groups: ['create:user',"edit:profile"])]
    private ?string $enterpriseName = '';

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank(groups: ['create:user',"edit:profile"])]
    private ?string $legalStatus = '';

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
     * @return string|null
     */
    public function getLegalStatus(): ?string
    {
        return $this->legalStatus;
    }

    /**
     * @param string|null $legalStatus
     */
    public function setLegalStatus(?string $legalStatus): void
    {
        $this->legalStatus = $legalStatus;
    }

    /**
     * @param string|null $enterpriseName
     */
    public function setEnterpriseName(?string $enterpriseName): void
    {
        $this->enterpriseName = $enterpriseName;
    }
}