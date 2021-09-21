<?php

namespace App\Entity\Skills;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\IdTrait;
use App\Entity\OwnerInterfaceInterface;
use App\Entity\Users\Freelancer;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 *
 *  @ORM\Entity()
 */
#[
 ApiResource
]
class Experience implements OwnerInterfaceInterface
{
    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    #[Groups(["read:profile:freelancer"])]
    private ?string $missionName = null;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    #[Groups(["read:profile:freelancer"])]
    private ?string $enterpriseName = null;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    #[Groups(["read:profile:freelancer"])]
    private ?string $description = null;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    #[Groups(["read:profile:freelancer"])]
    private ?string $place = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    #[NotBlank]
    #[Groups(["read:profile:freelancer"])]
    private ?\DateTimeInterface $startAt = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    #[NotBlank]
    #[Groups(["read:profile:freelancer"])]
    private ?\DateTimeInterface $endAt = null;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Freelancer",inversedBy="experience")
     */
    private Freelancer $freelancer;


    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getMissionName(): ?string
    {
        return $this->missionName;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->startAt;
    }

    /**
     * @return string|null
     */
    public function getPlace(): ?string
    {
        return $this->place;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    /**
     * @return Freelancer
     */
    public function getFreelancer(): Freelancer
    {
        return $this->freelancer;
    }


    /**
     * @return string|null
     */
    public function getEnterpriseName(): ?string
    {
        return $this->enterpriseName;
    }

    /**
     * @param string|null $missionName
     */
    public function setMissionName(?string $missionName): void
    {
        $this->missionName = $missionName;
    }

    /**
     * @param string|null $enterpriseName
     */
    public function setEnterpriseName(?string $enterpriseName): void
    {
        $this->enterpriseName = $enterpriseName;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string|null $place
     */
    public function setPlace(?string $place): void
    {
        $this->place = $place;
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

    /**
     * @param Freelancer $freelancer
     */
    public function setFreelancer(Freelancer $freelancer): void
    {
        $this->freelancer = $freelancer;
    }





}