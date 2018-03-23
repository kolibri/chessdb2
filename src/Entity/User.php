<?php declare(strict_types=1);

namespace App\Entity;

use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $uuid;
    private $username;
    private $email;
    private $password;
    private $aliases;
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
