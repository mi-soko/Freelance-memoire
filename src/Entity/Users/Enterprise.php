<?php

namespace App\Entity\Users;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Users\EnterpriseRepository")
 */
#[
    ApiResource(

        itemOperations: [
            'GET' => [
                'normalization_context' => ['groups' => ["read:enterprise"]],
            ],
            'DELETE' => [],
            'PUT' => []
        ],
        collectionOperations: [
            "POST" => [
                'validation_groups' => ['create:user']
            ],
            "GET" => []
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

    #[Groups(["read:offer","Default","read:enterprise"])]
    private ?string $enterpriseName = '';

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank(groups: ['create:user',"edit:profile"])]
    #[Groups(["read:offer","Default","read:enterprise"])]
    private ?string $legalStatus = '';


    #[Groups("read:enterprise")]
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
