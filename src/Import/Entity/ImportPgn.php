<?php declare(strict_types=1);

namespace App\Import\Entity;

use App\User\Entity\User;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Ramsey\Uuid\Uuid;

/**
 * @Entity()
 */
class ImportPgn
{
    /**
     * @var Uuid
     *
     * @Id()
     * @Column(type="uuid", unique=true)
     * @GeneratedValue(strategy="CUSTOM")
     * @CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $uuid;

    /**
     * @var string
     *
     * @Column(type="text")
     */
    private $pgnString;

    /**
     * @var null|\DateTimeInterface
     *
     * @Column(type="datetime", nullable=true)
     */
    private $imported;

    /**
     * @var User
     *
     * @ManyToOne(targetEntity="App\User\Entity\User")
     * @JoinColumn(name="user_uuid", referencedColumnName="uuid")
     */
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
