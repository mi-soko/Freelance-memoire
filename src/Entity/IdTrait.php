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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


}