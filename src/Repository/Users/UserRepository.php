<?php

namespace App\Repository\Users;

use App\Entity\Users\User;
use App\Repository\Users\UniqueEmailTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{

    use UniqueEmailTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

}