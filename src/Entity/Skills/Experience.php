<?php

namespace App\Entity\Skills;

use App\Entity\IdTrait;
use App\Entity\Users\Freelancer;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity()
 */
class Experience
{
    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    protected ?string $missionName = null;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    protected ?string $description = null;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    protected ?string $place = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected ?\DateTimeInterface $startAt = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected ?\DateTimeInterface $endAt = null;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Freelancer",inversedBy="experience")
     */
    protected Freelancer $freelancer;



}