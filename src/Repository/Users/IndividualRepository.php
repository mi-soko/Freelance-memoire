<?php

declare(strict_types=1);

namespace App\Repository\Users;

use App\Entity\Users\Individual;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class IndividualRepository extends ServiceEntityRepository
{

    use UniqueEmailTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Individual::class);
    }

}