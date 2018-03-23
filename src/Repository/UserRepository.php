<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserRepository
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function save(User $user)
    {
        $this->manager->persist($user);
        $this->manager->flush();
    }

    public function loadByName(string $username): User
    {
        return $this->manager->getRepository(User::class)->findOneBy(['username' => $username]);
    }
}
