<?php

declare(strict_types=1);

namespace App\Entity\Users;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({"enterprise" = "Enterprise", "individual" = "Individual"})
 */
abstract class ProjectHolder extends User
{
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    protected ?string $address;

    /**
     * @ORM\Column(type="string",length=20,nullable=true)
     */
    protected ?string $phoneNumber = null;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    protected ?string $description = null;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Offer", mappedBy="owner")
     */
    protected Collection $offers;


    #[Pure] public function __construct()
    {
        $this->offers = new ArrayCollection();
    }
}