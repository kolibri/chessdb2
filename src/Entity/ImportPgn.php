<?php declare(strict_types=1);

namespace App\Entity;

use Ramsey\Uuid\Uuid;

class ImportPgn
{
    private $uuid;
    private $pgnString;
    private $imported;
    private $user;

    public function __construct(string $pgnString, User $user)
    {
        $this->pgnString = $pgnString;
        $this->user = $user;
        $this->imported = null;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getPgnString(): string
    {
        return $this->pgnString;
    }

    public function getImported(): ?\DateTimeInterface
    {
        return $this->imported;
    }

    public function setImported(\DateTimeInterface $imported): void
    {
        $this->imported = $imported;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
