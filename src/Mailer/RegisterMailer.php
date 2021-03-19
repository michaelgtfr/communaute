<?php
/**
 * User: michaelgt
 */

namespace App\Mailer;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class RegisterMailer
{
    /**
     * Allows the send of a message for the registration
     * @param MailerInterface $mailer
     * @param $addressUser
     * @param $key
     * @param $host
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function mailer(MailerInterface $mailer, $addressUser, $key, $host)
    {
        $email = (new TemplatedEmail())
            ->From('michael.garret.france@gmail.com')
            ->to($addressUser)
            ->subject('Register email')
            ->htmlTemplate('emails/registerEmail.html.twig')
            ->context([
                'addressUser' => $addressUser,
                'key' => $key,
                'host' => $host
            ])
        ;
        $mailer->send($email);
    }
}