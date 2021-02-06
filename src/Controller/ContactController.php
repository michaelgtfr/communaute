<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 01/02/2021
 * Time: 17:14
 */

namespace App\Controller;


use App\Entity\Account\Contact;
use App\Form\ContactForm;
use App\Treatment\ContactTreatment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ContactController
{
    /**
     * @Route("/contact", name="app_contact")
     * @param Request $request
     * @param FormFactoryInterface $form
     * @param Environment $twig
     * @param Session $session
     * @param ContactTreatment $treatment
     * @param UrlGeneratorInterface $generator
     * @param EntityManagerInterface $em
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function contactController(Request $request, FormFactoryInterface $form, Environment $twig, Session $session,
                                      ContactTreatment $treatment, UrlGeneratorInterface $generator, EntityManagerInterface $em)
    {
        $contact = new Contact();

        $contactForm = $form->create(ContactForm::class, $contact);

        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact = $contactForm->getData();
            $treatment->treatment($contact, $em, $session);

            $router = $generator->generate('app_login');
            return new RedirectResponse($router, 302);
        }

        $render = $twig->render('contact.html.twig', [
            'form' => $contactForm->createView(),
        ]);
        return new Response($render);
    }
}