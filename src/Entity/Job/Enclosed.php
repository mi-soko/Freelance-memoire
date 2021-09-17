<?php

namespace App\Entity\Job;

use App\Entity\IdTrait;
use Doctrine\ORM\Mapping as ORM;

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
    private ?string $file = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\PostulationDetail", inversedBy="enclosed")
     */
    private PostulationDetail $postulationDetail;


}