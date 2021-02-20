<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 16:41
 */

namespace App\Tests\Form;


use App\Entity\Account\User;
use App\Form\RegisterForm;
use DateTime;
use Symfony\Component\Form\Test\TypeTestCase;

class RegisterFormTest extends TypeTestCase
{
    public function testRegisterFormBuild()
    {
        $dateTime = new DateTime();

        $data = [
            'username' => 'usernameTest',
            'description' => 'descriptionTest',
            'country' => 'countryTest',
            'address' => 'addressTest',
            'name' => 'nameTest',
            'firstName' => 'firstNameTest',
            'email' => 'emailTest',
            'dateBirth' => [
                'month' => (int)$dateTime->format('m'),
                'year' => (int)$dateTime->format('Y'),
                'day' => (int)$dateTime->format('d'),
                ],
            'password' => 1,
            'passwordConfirm' => 1,
            'termsOfUse' => true,
        ];

        $dateBirth = $data['dateBirth'];
        $date = "{$dateBirth['year']}-{$dateBirth['month']}-{$dateBirth['day']} 00:00:00";
        $dateNoTime = $dateTime::createFromFormat('Y-m-d H:i:s', $date);

        $user = new User();

        $formContact = $this->factory->create(RegisterForm::class, $user);

        $dataToCompare = new User;
        $dataToCompare->setUsername($data['username']);
        $dataToCompare->setDescription($data['description']);
        $dataToCompare->setCountry($data['country']);
        $dataToCompare->setAddress($data['address']);
        $dataToCompare->setName($data['name']);
        $dataToCompare->setFirstName($data['firstName']);
        $dataToCompare->setEmail($data['email']);
        $dataToCompare->setDateBirth($dateNoTime);
        $dataToCompare->setPassword($data['password']);
        $dataToCompare->setPasswordConfirm($data['passwordConfirm']);
        $dataToCompare->setTermsOfUse($data['termsOfUse']);

        $formContact->submit($data);

        $this->assertTrue($formContact->isSynchronized());

        $this->assertEquals($user->getUsername(), $dataToCompare->getUsername());
        $this->assertEquals($user->getDescription(), $dataToCompare->getDescription());
        $this->assertEquals($user->getCountry(), $dataToCompare->getCountry());
        $this->assertEquals($user->getAddress(), $dataToCompare->getAddress());
        $this->assertEquals($user->getName(), $dataToCompare->getName());
        $this->assertEquals($user->getFirstName(), $dataToCompare->getFirstName());
        $this->assertEquals($user->getEmail(), $dataToCompare->getEmail());
        $this->assertEquals($user->getDateBirth(), $dataToCompare->getDateBirth());
        $this->assertEquals($user->getPassword(), $dataToCompare->getPassword());
        $this->assertEquals($user->getPasswordConfirm(), $dataToCompare->getPasswordConfirm());
        $this->assertEquals($user->getCompletePictureName(), $dataToCompare->getCompletePictureName());
        $this->assertEquals($user->getTermsOfUse(), $dataToCompare->getTermsOfUse());

        $view = $formContact->createView();
        $children = $view->children;

        foreach (array_keys($data) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
