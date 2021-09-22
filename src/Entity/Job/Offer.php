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
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 *  @ORM\Entity()
 */
#[ApiResource(
    normalizationContext: [
        'groups' => ["read:offer"]
    ],
)]
class Offer
{
    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    #[Groups(["Default","read:offer","read:enterprise"])]
    private ?string $title = null;

    /**
     * @ORM\Column(type="text",nullable=false)
     */
    #[NotBlank]
    #[Groups(["Default","read:offer","read:enterprise"])]
    private ?string $description = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    #[NotBlank]
    #[Groups(["Default","read:offer","read:enterprise"])]
    private ?\DateTimeInterface $startAt = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    #[NotBlank]
    #[Groups(["Default","read:offer","read:enterprise"])]
    private ?\DateTimeInterface $endAt = null;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Skill", inversedBy="offers")
     * @ORM\JoinTable(name="competences_for_offers")
     */
    #[Assert\Valid,Assert\NotNull]
    #[Groups(["Default","read:offer","read:enterprise"])]
    private $skills;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Language", inversedBy="offers")
     * @ORM\JoinTable(name="languages_for_offers")
     */
    #[Assert\Valid]
    #[Groups(["Default","read:offer","read:enterprise"])]
    private $languages;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\User", inversedBy="offers")
     */
    #[Assert\Valid]
    #[Groups(["Default","read:offer"])]
    private User $owner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\PostulationDetail", mappedBy="offer")
     */
    #[Groups(["Default","read:offer","read:enterprise"])]
    private Collection $postulations;


    #[Pure]
    public function __construct()
    {
        $this->languages = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->postulations = new ArrayCollection();
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner(User $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }


    public function getEndAt():  \DateTimeInterface | string | null
    {
        return $this->endAt->format("d-F-Y");
    }


    public function getLanguages(): array
    {
        return $this->languages->getValues();
    }

    public function setLanguages( $languages): void
    {
        $this->languages = $languages;
    }

    public function getStartAt(): \DateTimeInterface | string | null
    {

        return $this->startAt->format("d-F-Y");
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }


    public function getSkills(): array
    {
        return $this->skills->getValues();
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param \DateTimeInterface|null $startAt
     */
    public function setStartAt(?\DateTimeInterface $startAt): void
    {
        $this->startAt = $startAt;
    }

    /**
     * @param \DateTimeInterface|null $endAt
     */
    public function setEndAt(?\DateTimeInterface $endAt): void
    {
        $this->endAt = $endAt;
    }


    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @param ArrayCollection|Collection $postulations
     */
    public function setPostulations(ArrayCollection|Collection $postulations): void
    {
        $this->postulations = $postulations;
    }





}
