<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{

    /**
     * @ORM\GeneratedValue()
     * @ORM\Id()
     * @ORM\Column(type="bigint")
     */
    protected int $id;


}