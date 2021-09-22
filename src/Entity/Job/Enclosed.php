<?php

namespace App\Entity\Job;

use App\Entity\IdTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  @ORM\Entity()
 */
class Enclosed
{

    use IdTrait;

    /**
     * @ORM\Column(type="string", length=255,nullable=false)
     */
    private ?string $name = null;

    /**
     * @ORM\Column(type="text",nullable=false)
     */
    #[Groups(["read:offer"])]
    private ?string $file = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\PostulationDetail", inversedBy="enclosed")
     */
    private PostulationDetail $postulationDetail;


}
