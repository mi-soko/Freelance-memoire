<?php

namespace App\Entity\Skills;

use App\Entity\IdTrait;
use Doctrine\ORM\Mapping as ORM;

class Language
{
    use IdTrait;

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    protected ?string $name = null;
}