<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 12/02/2021
 * Time: 07:15
 */

namespace App\Tests\Treatment;


use App\Entity\Account\User;
use App\Treatment\RegisterTreatment;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\PhpUnit\SetUpTearDownTrait;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterTreatmentTest extends TestCase
{
    use SetUpTearDownTrait;

    private $entity;
    private $mailer;
    private $passwordEncoder;

    public function doSetUp()
    {
        $this->entity = $this->createMock(EntityManagerInterface::class);

        $this->mailer = $this->createMock(MailerInterface::class);
        $this->mailer->method('send');

        $this->passwordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $this->passwordEncoder->method('encodePassword')
            ->willReturn('passwordTest');
    }

    public function testRegisterTreatment()
    {
        $user = new User();
        $user->setPassword('1');
        $user->setEmail('emailTest@gmail.com');

        $session = new Session(new MockArraySessionStorage());

        $registerTreatment = new RegisterTreatment();
        $registerTreatment->treatment($user, $this->entity, $this->mailer, $session, $this->passwordEncoder, 'hostTest', null);

        $this->assertArrayHasKey(0 ,$session->getFlashBag()->get('success'));
    }
}