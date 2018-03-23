<?php declare(strict_types=1);

namespace App\User;

use App\User\Entity\User;
use App\User\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class RegistrationHandler
{
    private $encoders;
    private $repository;

    public function __construct(EncoderFactoryInterface $encoders, UserRepository $repository)
    {
        $this->encoders = $encoders;
        $this->repository = $repository;
    }

    public function register(User $user)
    {
        $encoder = $this->encoders->getEncoder(User::class);
        $user->setPassword($encoder->encodePassword($user->getPassword(), null));

        $this->repository->save($user);
    }
}
