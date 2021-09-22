<?php

declare(strict_types=1);

namespace App\Entity\Job;

use App\Entity\IdTrait;
use App\Entity\Users\Freelancer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Serializer\Annotation\Groups;

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
    #[Groups(["read:offer"])]
    private Freelancer $freelancers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\Offer", inversedBy="postulations")
     */
    private Offer $offer;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Enclosed", mappedBy="postulationDetail")
     */
    private Collection $enclosed;


     public function __construct()
    {
        $this->enclosed = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }


    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return "Pas de message";
    }

    /**
     * @return Freelancer
     */
    public function getFreelancers(): Freelancer
    {
        return $this->freelancers;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;

    }

    /**
     * @param Offer $offer
     */
    public function setOffer(Offer $offer): void
    {
        $this->offer = $offer;
    }

    /**
     * @param Freelancer $freelancers
     */
    public function setFreelancers(Freelancer $freelancers): void
    {
        $this->freelancers = $freelancers;
    }


    



}
