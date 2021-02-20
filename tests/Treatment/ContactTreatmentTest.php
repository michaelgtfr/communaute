<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 11/02/2021
 * Time: 15:17
 */

namespace App\Tests\Treatment;


use App\Entity\Account\Contact;
use App\Entity\Account\User;
use App\Treatment\ContactTreatment;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\PhpUnit\SetUpTearDownTrait;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class ContactTreatmentTest extends TestCase
{
    use SetUpTearDownTrait;

    private $session;

    private $entity;

    protected function doSetUp()
    {
        $user = new User();

        $this->session = new Session(new MockArraySessionStorage());

        $userEntity = $this->createMock(ObjectRepository::class);
        $userEntity->method('findOneBy')
            ->willReturn($user);

        $this->entity = $this->createMock(EntityManagerInterface::class);
        $this->entity->method('getRepository')
            ->willReturn($userEntity);
    }

    public function testContactTreatment()
    {
        $contact = new Contact();
        $contact->setEmail('emailTest');
        $contact->setUsername('usernameTest');


        $contactTreatment = new ContactTreatment();
        $contactTreatment->treatment($contact, $this->entity, $this->session);

        $this->assertArrayHasKey(0 ,$this->session->getFlashBag()->get('success'));
    }
}