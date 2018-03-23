<?php declare(strict_types=1);

namespace App\User\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Entity
 */
class User implements UserInterface
{
    /**
     * @var Uuid
     *
     * @Id
     * @Column(type="uuid", unique=true)
     * @GeneratedValue(strategy="CUSTOM")
     * @CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $uuid;

    /**
     * @var string
     * @Column
     */
    private $username;

    /**
     * @var string
     * @Column
     */
    private $email;

    /**
     * @var string
     * @Column
     */
    private $password;

    /**
     * @var array
     * @Column(type="simple_array")
     */
    private $aliases;

    /**
     * @var array
     * @Column(type="simple_array")
     */
    private $roles;

    public function __construct(
        string $username,
        string $email,
        string $password,
        array $aliases = [],
        array $roles = ['ROLE_USER']
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->aliases = $aliases;
        $this->roles = $roles;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function setAliases(array $aliases)
    {
        $this->aliases = $aliases;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    public function getSalt()
    {
    }

    public function eraseCredentials(): void
    {
    }
}
