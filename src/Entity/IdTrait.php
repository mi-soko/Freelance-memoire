<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

trait IdTrait
{

    /**
     * @ORM\GeneratedValue()
     * @ORM\Id()
     * @ORM\Column(type="bigint")
     */
    #[Groups(["read:id","Default","edit:profile","read:offer","read:enterprise"])]
    protected ?int $id = null;

    /**
     * @return int
     */
    public function getId(): ?int
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
