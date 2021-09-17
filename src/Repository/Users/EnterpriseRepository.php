<?php

declare(strict_types=1);

namespace App\Repository\Users;

use App\Entity\Users\Enterprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EnterpriseRepository extends ServiceEntityRepository
{

    use UniqueEmailTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enterprise::class);
    }

}