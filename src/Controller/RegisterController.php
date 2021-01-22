<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 18/01/2021
 * Time: 18:09
 */

namespace App\Controller;

use App\Entity\Account\User;
use App\Form\RegisterForm;
use App\Treatment\RegisterTreatment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Twig\Environment;

class RegisterController
{
    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @param FormFactoryInterface $form
     * @param Environment $twig
     * @param Session $session
     * @param EntityManagerInterface $em
     * @param RegisterTreatment $treatment
     * @param UrlGeneratorInterface $generator
     * @param MailerInterface $mailer
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function register(Request $request, FormFactoryInterface $form, Environment $twig, Session $session,
                             EntityManagerInterface $em, RegisterTreatment $treatment, UrlGeneratorInterface $generator,
                             MailerInterface $mailer,  UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        $registerForm = $form->create(RegisterForm::class, $user);

        $registerForm->handleRequest($request);
        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            $user = $registerForm->getData();
            if($user->passwordValid()){
                $treatment->treatment($user, $em, $mailer, $session,
                    $passwordEncoder,$request->headers->get('host'),
                    $registerForm->get('completePictureName')->getData()->guessExtension());

                $router = $generator->generate('app_login');
                return new RedirectResponse($router, 302);
            }
            $session->getFlashBag()->add(
                'error',
                'Désolé, mais vos informations ne sont pas bon, veuillez vérifiés les informations écritent.'
            );
        }
        $render = $twig->render('security/register.html.twig', [
            'form' => $registerForm->createView(),
        ]);
        return new Response($render);
    }
}
