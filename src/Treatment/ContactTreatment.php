<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 04/02/2021
 * Time: 07:19
 */

namespace App\Treatment;


use App\Entity\Account\Contact;
use App\Entity\Account\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class ContactTreatment
{
    private $em;

    public function treatment(Contact $contact, EntityManagerInterface $em,Session $session)
    {
        $this->em = $em;
        $existAccount = $this->existAccount($contact->getEmail());
        $contact->setExistAccount($existAccount);

        $em->persist($contact);
        $em->flush();

        $session->getFlashBag()->add(
            'success',
            'Votre message à été enregistré, vous recevrez dans les plus bref délais une réponse dans votre boite email'
        );
    }

    protected function existAccount($email)
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['email' => $email]);
        if($user == null) {
            return null;
        }
        return $user;
    }

}