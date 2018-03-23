<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends Controller
{
    /** @Route("/") */
    public function homepage(Request $request)
    {
        return $this->render('homepage/homepage.html.twig');
    }
}
