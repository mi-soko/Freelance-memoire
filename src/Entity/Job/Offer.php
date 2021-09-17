<?php

namespace App\Entity\Job;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\IdTrait;
use App\Entity\Users\ProjectHolder;
use App\Entity\Users\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 *  @ORM\Entity()
 */
#[ApiResource]
class Offer
{
    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    protected ?string $title = null;

    /**
     * @ORM\Column(type="text",nullable=false)
     */
    #[NotBlank]
    protected ?string $description = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    #[NotBlank,Assert\Date]
    protected ?\DateTimeInterface $startAt = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    #[NotBlank,Assert\Date]
    protected ?\DateTimeInterface $endAt = null;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Skill", inversedBy="offers")
     * @ORM\JoinTable(name="competences_for_offers")
     */
    #[Assert\Valid]
    private Collection $skills;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Language", inversedBy="offers")
     * @ORM\JoinTable(name="languages_for_offers")
     */
    #[Assert\Valid]
    private Collection $languages;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\User", inversedBy="offers")
     */
    #[Assert\Valid]
    private User $owner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\PostulationDetail", mappedBy="offer")
     */
    private Collection $postulations;


    #[Pure]
    public function __construct()
    {
        $this->languages = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->postulations = new ArrayCollection();
    }

    /**
     * @return ProjectHolder
     */
    public function getOwner(): ProjectHolder
    {
        return $this->owner;
    }




}