<?php

declare(strict_types=1);

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Redirection extends AbstractController
{
    /**
     * @Route(path="notFound", name="notFound")
     */
    public function notFound(): void
    {
        throw  $this->createNotFoundException('Cette page n\'existe pas');
    }

}