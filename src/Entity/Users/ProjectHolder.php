<?php

declare(strict_types=1);

namespace App\Entity\Users;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;


trait  ProjectHolder
{
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    #[NotBlank(groups: ['profile'])]
    #[Groups(["read:offer","Default","read:enterprise"])]
    protected ?string $address = null;

    /**
     * @ORM\Column(type="string",length=20,nullable=true)
     */
    #[NotBlank(groups: ['profile'])]
    #[Groups(["read:offer","Default","read:enterprise"])]
    protected ?string $phoneNumber = null;
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    #[NotBlank(groups: ['profile',"read:enterprise"])]
    #[Groups(["read:offer","Default"])]
    protected ?string $description = null;


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
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string|null $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

}
