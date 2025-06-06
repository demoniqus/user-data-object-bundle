<?php
declare(strict_types=1);

namespace Demoniqus\UserDataObjectBundle\Entity;
use Demoniqus\DataObjectBundle\Common\Traits\EmailFieldEntityTrait;
use Demoniqus\DataObjectBundle\DataObject\Representative\Entity\DataObjectEntity;
use Demoniqus\UserDataObjectBundle\Interfaces\UserEntityInterface;
use Demoniqus\UserDataObjectBundle\Repository\UserRepository;
use Demoniqus\UserDataObjectBundle\Traits\UserTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table('fos_user')]
#[ORM\UniqueConstraint(name: 'idx_username', fields: ['username'])]
class User extends DataObjectEntity implements UserInterface, PasswordAuthenticatedUserInterface, UserEntityInterface
{
    use UserTrait;
    use EmailFieldEntityTrait;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $username = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column(type: 'array')]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column]
    private ?string $surname = null;
    #[ORM\Column]
    private ?string $patronymic = null;
    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $expiredAt = null;

    #[ORM\Column]
    private ?string $salt = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $lastLogin = null;


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
