<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 18/01/2021
 * Time: 20:34
 */

namespace App\Treatment;


use App\Entity\Account\User;
use App\Mailer\RegisterMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterTreatment
{
    public function treatment(User $user, UrlGeneratorInterface $generator, EntityManagerInterface $em,
                              MailerInterface $mailer, Session $session,  UserPasswordEncoderInterface $passwordEncoder,
                              $host)
    {
        $key = md5(microtime(true)*100000);

        $user->setDateCreate(new \DateTime());
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
        $user->setConfirmationKey($key);
        $user->setConfirmation('0');
        $em->persist($user);
        $em->flush();

        (new RegisterMailer())->mailer($mailer, $user->getEmail(), $key, $host);

        $session->getFlashBag()->add(
            'success',
            'Félicitation votre compte a été créé vous devez confirmer votre inscription en 
                            cliquant sur le lien envoyé sur votre boite mail pour pouvoir vous connectez. 
                            Si vous n\'avez pas reçu votre email, allez sur la page de connexion, 
                            cliquez sur le lien du mot de passe oublié et Suivez les instructions.'
        );
        $router = $generator->generate('app_homepage');
        return new RedirectResponse($router, 302);
    }
}