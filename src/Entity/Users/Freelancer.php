<?php

declare(strict_types=1);

namespace App\Entity\Users;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;

/**
 * @ORM\Entity()
 * @UniqueEntity("email")
 * @method string getUserIdentifier()
 */

#[
    ApiResource(
        itemOperations: [
            'GET' => [],
            'PATCH' => [
                'denormalization_context' => ['groups' => ['profile','Default']],
            ],
            'DELETE' => []
        ]
    )
]
class Freelancer extends User
{

    /**
     * @ORM\Column(type="text",length=255,nullable=true)
     */
    #[NotBlank(groups: ['profile'])]
    private ?string $description = null;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    #[NotBlank(groups: ['profile'])]
    private ?string $speciality = null;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Skills\Experience",mappedBy="freelancer",cascade={"remove"})
     */
    #[Valid(groups: ['profile'])]
    private Collection $experience;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Skill", inversedBy="freelancers")
     * @ORM\JoinTable(name="competences_for_freelancers")
     */
    #[Valid(groups: ['profile'])]
    private Collection $skills;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Language", inversedBy="freelancers")
     * @ORM\JoinTable(name="languages_for_freelancers")
     */
    #[Valid(groups: ['profile'])]
    private Collection $languages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\PostulationDetail", mappedBy="freelancers")
     */
    #[Valid(groups: ['profile'])]
    private Collection $postulations;



    public function __construct()
    {
        parent::__construct();
        $this->experience = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->postulations = new ArrayCollection();
    }

    public function getRoles():array
    {
        return ["Freelancer"];
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    /**
     * @param string $speciality
     */
    public function setSpeciality(string $speciality): void
    {
        $this->speciality = $speciality;
    }


    /**
     * @return ArrayCollection|Collection
     */
    public function getExperience(): ArrayCollection|Collection
    {
        return $this->experience;
    }

    /**
     * @param ArrayCollection|Collection $experience
     */
    public function setExperience(ArrayCollection|Collection $experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getSkills(): ArrayCollection|Collection
    {
        return $this->skills;
    }

    /**
     * @param ArrayCollection|Collection $skills
     */
    public function setSkills(ArrayCollection|Collection $skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getLanguages(): ArrayCollection|Collection
    {
        return $this->languages;
    }

    /**
     * @param ArrayCollection|Collection $languages
     */
    public function setLanguages(ArrayCollection|Collection $languages): void
    {
        $this->languages = $languages;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getPostulations(): ArrayCollection|Collection
    {
        return $this->postulations;
    }

    /**
     * @param ArrayCollection|Collection $postulations
     */
    public function setPostulations(ArrayCollection|Collection $postulations): void
    {
        $this->postulations = $postulations;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}