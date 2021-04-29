<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route(path="/", name="accueil")
 */
final class Accueil extends AbstractController
{
    public function __invoke(Request $request)
    {
        //set_time_limit(0);
        //$name = $request->get('name','hello');
        return $this->render('accueil.html.twig');
    }
}
