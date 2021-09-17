<?php

namespace App\Entity\Job;

use App\Entity\IdTrait;
use Doctrine\ORM\Mapping as ORM;

class Offer
{

    use IdTrait;


    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    protected ?string $title = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected ?string $description = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected ?string $startAt = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected ?string $endAt = null;



}