<?php

declare(strict_types=1);

namespace App\Repository\Users;
use App\Entity\Users\User;

trait UniqueEmailTrait
{
    /**
     * @param array<string, mixed> $criteria
     * @return array<User>
     */
    public function findByUniqueEmail(array $criteria): array
    {
        return $this->_em->getRepository(User::class)->findBy($criteria);
    }
}