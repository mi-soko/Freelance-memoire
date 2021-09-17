<?php

namespace App\Entity\Job;

use App\Entity\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity()
 */
class PostulationDetail
{

    use IdTrait;


    /**
     * @ORM\Column(type="text",nullable=false)
     */
    protected ?string $message = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected ?\DateTimeInterface $createdAt = null;




}