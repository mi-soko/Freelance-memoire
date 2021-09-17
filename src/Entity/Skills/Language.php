<?php

namespace App\Entity\Skills;

use App\Entity\IdTrait;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity()
 */
class Language
{
    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    protected ?string $name = null;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users\Freelancer", mappedBy="languages")
     */
    private Collection $freelancers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Offer", mappedBy="languages")
     */
    private Collection $offers;


}