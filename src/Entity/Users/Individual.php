<?php

namespace App\Entity\Users;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Individual extends ProjectHolder
{

    public function getRoles():array
    {
        return ["Individual"];
    }
}