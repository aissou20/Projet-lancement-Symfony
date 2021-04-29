<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscribe;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SubscribeController
 * @package App\Controller
 * @Route(path="/subscribe" , name="subscribe")
 */
final class SubscribeController extends AbstractController
{
    public function __invoke(Request $request, MailerInterface $mailer)
    {
        $subscribing = new Subscribe();
        $builder = $this->createFormBuilder($subscribing)
            ->add('pseudo')
            ->add('name', TextType::class, array('required' => false))
            ->add('email', EmailType::class)
            ->add('submit', SubmitType::class);

        $form = $builder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $mailer->send(
                (new TemplatedEmail())->to($subscribing->email)
                    ->from('adia01@mail.fr')
                    ->subject(sprintf('Sortie tenue de sport'))
                    ->htmlTemplate('emails/subscribe.html.twig')
                    ->context([
                        'pseudo' => empty($subscribing->pseudo )? '' : $subscribing->pseudo,
                        'name' => empty($subscribing->name )? '' : $subscribing->name,
                    ])
            );
            $this->addFlash('notice', 'Vous serez informé lors de la sortie du produit ');
        }
        return $this->render('subscribe.html.twig', ['form'=>$form->createView()]);

    }

}