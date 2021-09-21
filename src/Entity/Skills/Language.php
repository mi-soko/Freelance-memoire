<?php

namespace App\Entity\Skills;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\IdTrait;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 *  @ORM\Entity()
 */
#[
    ApiResource

    ]
class Language
{
    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    protected ?string $name = null;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users\Freelancer", mappedBy="languages")
     */
    private Collection $freelancers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Offer", mappedBy="languages")
     */
    private Collection $offers;


    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

}