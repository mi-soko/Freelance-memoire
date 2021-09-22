<?php

namespace App\Entity\Skills;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;


/**
 * @ORM\Entity()
 */
#[
    ApiResource
]
class Skill
{

    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    #[Groups(["read:profile:freelancer","Default","edit:profile","read:offer","read:enterprise"])]
    private ?string $name = null;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users\Freelancer", mappedBy="skills")
     */
    private Collection $freelancers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Offer", mappedBy="skills")
     */
    private Collection $offers;


    #[Pure] public function __construct()
    {
        $this->freelancers = new ArrayCollection();
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

}
