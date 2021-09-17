<?php

declare(strict_types=1);

namespace App\Entity\Users;

use App\Entity\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;
use App\Repository\Users\UserRepository;
/**
 * @method string getUserIdentifier()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("email",repositoryMethod="findByUniqueEmail")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({"enterprise" = "Enterprise", "individual" = "Individual","freelancer" = "Freelancer"})
 */
abstract class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    use IdTrait;
    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    protected ?string $firstName = '';

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank]
    protected ?string $lastName = '';

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */
    #[NotBlank,Email]
    protected ?string $email = '';

    /**
     * @ORM\Column(type="string",length=255,nullable=false)
     */

    protected ?string $password = '';

    #[NotBlank]
    #[Length(min: 8, max: 4096)]
    public ?string $plainPassword = null;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected ?\DateTimeInterface $createdAt = null;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Offer", mappedBy="owner")
     */
    #[Valid(groups: ['profile'])]
    protected Collection $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }


    public function getPassword():string
    {
       return $this->password;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    public function getUsername():string
    {
       return $this->email;
    }


    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     */
    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }


    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return \DateTime|\DateTimeInterface
     */
    public function getCreatedAt(): \DateTime|\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|\DateTimeInterface $createdAt
     */
    public function setCreatedAt(\DateTime|\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

}