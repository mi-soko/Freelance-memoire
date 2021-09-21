<?php

namespace App\Entity\Skills;

use App\Entity\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;


/**
 * @ORM\Entity()
 */
class Skill
{

    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
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


}