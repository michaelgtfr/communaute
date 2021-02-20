<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 18/01/2021
 * Time: 20:49
 */

namespace App\Mailer;


use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class RegisterMailer
{
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