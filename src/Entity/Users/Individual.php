<?php

namespace App\Entity\Users;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Users\IndividualRepository")
 */
#[
    ApiResource(
        itemOperations: [
            'GET' => [],
            'PATCH' => [
                'denormalization_context' => ['groups' => ['profile','Default']],
            ],
            'DELETE' => []
        ],
        collectionOperations: [
            "POST" => [
                'validation_groups' => ['create:user']
            ]
        ],
    )
]
class Individual extends User
{
    use ProjectHolder;

    public function getRoles():array
    {
        return ["Individual"];
    }
}
