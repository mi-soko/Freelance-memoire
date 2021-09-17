<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"projectHolder" = "ProjectHolder", "freelancer" = "Freelancer","user" = "User"})
 */
abstract class User
{

    protected int $id;

}