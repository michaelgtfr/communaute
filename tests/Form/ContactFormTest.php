<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 16:33
 */

namespace App\Tests\Form;


use App\Entity\Account\Contact;
use App\Form\ContactForm;
use Symfony\Component\Form\Test\TypeTestCase;

class ContactFormTest extends TypeTestCase
{
    public function testContactFormBuild()
    {
        $data = [
            'email' => 'emailTest@gmail.com',
            'username' => 'usernameTest',
            'content' => 'contentTest'
        ];

        $contact = new Contact();

        $formContact = $this->factory->create(ContactForm::class, $contact);

        $dataToCompare = new Contact();
        $dataToCompare->setEmail($data['email']);
        $dataToCompare->setUsername($data['username']);
        $dataToCompare->setContent($data['content']);

        $formContact->submit($data);

        $this->assertTrue($formContact->isSynchronized());

        $this->assertEquals($contact->getEmail(), $dataToCompare->getEmail());
        $this->assertEquals($contact->getUsername(), $dataToCompare->getUsername());
        $this->assertEquals($contact->getContent(), $dataToCompare->getContent());

        $view = $formContact->createView();
        $children = $view->children;

        foreach (array_keys($data) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}