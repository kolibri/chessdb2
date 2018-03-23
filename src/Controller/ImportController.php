<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/import")
 */
class ImportController extends Controller
{
    /**
     * @Route("/pgn")
     */
    public function importPgn(Request $request)
    {
        return $this->render(
            'import/import_pgn.html.twig',
            [

            ]
        );
    }
}
