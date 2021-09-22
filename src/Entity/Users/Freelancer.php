<?php

declare(strict_types=1);

namespace App\Entity\Users;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Skills\Language;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;

#[
    ApiResource(

            itemOperations: [
            'PUT' => [
                'validation_groups' => ["edit:profile"],
                'denormalization_context' => ['groups' => ["edit:profile","Default"]],
            ],
            'DELETE' => [],
            "GET" => []
        ],
        collectionOperations: [
            "POST" => [
                'validation_groups' => ['create:user']
            ]
        ],
        normalizationContext: [
            'groups' => ["read:profile:freelancer","Default"]
        ]
    )
]

/**
 * @ORM\Entity(repositoryClass="App\Repository\Users\FreelancerRepository")
 */
class Freelancer extends User
{

    /**
     * @ORM\Column(type="text",length=255,nullable=true)
     */
    #[NotBlank(groups: ["edit:profile"])]
    #[Groups(["read:profile:freelancer","edit:profile"])]
    private ?string $description = null;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    #[NotBlank(groups: ["edit:profile"])]
    #[Groups(["read:profile:freelancer","edit:profile"])]
    private ?string $speciality = null;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Skills\Experience",mappedBy="freelancer",cascade={"remove"})
     */
    #[Valid(groups: ['edit:profile'])]
    #[Groups(["read:profile:freelancer"])]
    private  $experience;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Skill", inversedBy="freelancers")
     * @ORM\JoinTable(name="competences_for_freelancers")
     */
    #[Valid(groups: ['profile'])]
    #[Groups(["read:profile:freelancer","edit:profile"])]
    private  $skills;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skills\Language", inversedBy="freelancers")
     * @ORM\JoinTable(name="languages_for_freelancers")
     */
    #[Valid(groups: ['profile'])]
    #[Groups(["read:profile:freelancer","edit:profile"])]
    private $languages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\PostulationDetail", mappedBy="freelancers")
     */
    #[Valid(groups: ['profile'])]
    #[Groups(["read:profile:freelancer"])]
    private $postulations;



    public function __construct()
    {
        parent::__construct();
        $this->experience = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->languages = new ArrayCollection();
        $this->postulations = new ArrayCollection();
    }

    #[Groups(["read:profile:freelancer"])]
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


    public function getSkills():array
    {
        return $this->skills->getValues();
    }


    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @return array
     */
    public function getLanguages(): array
    {
        return $this->languages->getValues();
    }


    public function setLanguages($languages): void
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
    #[Groups("read:profile:freelancer")]
    public function getExperienceLength():int
    {
        return $this->experience->count();
    }


}
