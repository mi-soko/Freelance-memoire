<?php

declare(strict_types=1);

namespace App\Entity\Job;

use App\Entity\IdTrait;
use App\Entity\Users\Freelancer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 *  @ORM\Entity()
 *  @ORM\Table(
    uniqueConstraints={
    @ORM\UniqueConstraint(name="freelancers_offer_unique", columns={"freelancers_id", "offer_id"})
    }
)
 */
class PostulationDetail
{

    use IdTrait;


    /**
     * @ORM\Column(type="text",nullable=false)
     */
    private ?string $message = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    private ?\DateTimeInterface $createdAt = null;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Freelancer", inversedBy="postulations")
     */
    private Freelancer $freelancers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\Offer", inversedBy="postulations")
     */
    private Offer $offer;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Enclosed", mappedBy="postulationDetail")
     */
    private Collection $enclosed;


    #[Pure] public function __construct()
    {
        $this->enclosed = new ArrayCollection();
    }


}