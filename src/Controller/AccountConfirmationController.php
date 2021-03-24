<?php
/**
 * User: michaelgt
 */

namespace App\Controller;

use App\Entity\Account\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AccountConfirmationController
{
    /**
     * Functional test performed in the register.feature file and in the RegisterControllerTest file in the Tests folder
     * Used to confirm the creation of a user account
     * @Route("/confirmation/{email}/confirmationKey/{confirmationKey}", name="app_account_confirmation")
     * @ParamConverter("user", options={"mapping": {"email": "email", "confirmationKey": "confirmationKey"}})
     * @param User $user
     * @param EntityManagerInterface $em
     * @param UrlGeneratorInterface $generator
     * @param Session $session
     * @return RedirectResponse
     */
    public function confirmation(User $user, EntityManagerInterface $em, UrlGeneratorInterface $generator,
                                 Session $session)
    {
        if ($user->getConfirmation()== 1)
        {
            $session->getFlashBag()->add(
                'success',
                'votre compte est déja confirmé, vous pouvez des à présent vous connecter au site.'
            );
        } else {
            $user->setConfirmation(1);
            $em->flush();

            $session->getFlashBag()->add(
                'success',
                'votre compte est confirmé, vous pouvez des à présent vous connecter au site.'
            );
        }

        $router = $generator->generate('app_login');
        return new RedirectResponse($router, 302);
    }
}
