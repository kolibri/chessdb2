<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserRegistrationType;
use App\User\RegistrationHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends Controller
{
    /** @Route("/register", name="register") */
    public function register(Request $request, RegistrationHandler $handler)
    {
        $form = $this->createForm(UserRegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $handler->register($form->getData());
            // handle registration
            $this->addFlash('notice', 'flash.registration.success');

            return $this->redirectToRoute('login');
        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /** @Route("/profile/{username}"), name="profile" */
    public function profile(User $user)
    {
        return $this->render('user/profile.html.twig', ['user' => $user]);
    }

    /** @Route("/login", name="login") */
    public function login(Request $request, AuthenticationUtils $utils)
    {
        return $this->render('user/login.html.twig', [
            'username' => $utils->getLastUsername(),
            'errors' => $utils->getLastAuthenticationError(),
        ]);
    }

    /** @Route("/logout", name="logout") */
    public function logout()
    {
    }
}
