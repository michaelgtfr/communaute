<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 07/02/2021
 * Time: 15:39
 */

namespace App\Tests\Entity\Account;


use App\Entity\Account\Contact;
use App\Entity\Account\User;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testContactEntity()
    {
        $contact = new Contact();
        $user = new User();

        $contact->setEmail('emailTest@gmail.com');
        $contact->setExistAccount($user);
        $contact->setUsername('usernameTest');
        $contact->setContent('contentTest');

        $this->assertEquals(null, $contact->getId());
        $this->assertEquals('emailTest@gmail.com', $contact->getEmail());
        $this->assertEquals('usernameTest', $contact->getUsername());
        $this->assertEquals('contentTest', $contact->getContent());
        $this->assertEquals($user, $contact->getExistAccount());
    }
}