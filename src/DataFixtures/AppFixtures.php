<?php
/**
 * User: michaelgt
 */

namespace App\DataFixtures;

use App\Entity\Account\AccountParameter;
use App\Entity\Account\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $accountParameter = new AccountParameter();

        $user = new User();
        $user->setName('nameTest');
        $user->setFirstName('firstNameTest');
        $user->setDateCreate(new \DateTime());
        $user->setConfirmationKey('123');
        $user->setConfirmation('0');
        $user->setUsername('username_test');
        $user->setPassword($this->encoder->encodePassword($user,'1'));
        $user->setEmail('test_email@gmail.com');
        $user->setRoles([
            "ROLE_USER",
            "ROLE_ADMIN"
        ]);
        $user->setAccountParameters($accountParameter);

        $this->setReference('user', $user);

        $manager->persist($user);

        $manager->flush();
    }
}
