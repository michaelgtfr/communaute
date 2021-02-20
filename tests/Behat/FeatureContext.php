<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 14/02/2021
 * Time: 11:22
 */

namespace App\Tests\Behat;


use App\Entity\Account\AccountParameter;
use App\Entity\Account\User;
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use DAMA\DoctrineTestBundle\Doctrine\DBAL\StaticDriver;
use Symfony\Component\HttpKernel\KernelInterface;

class FeatureContext extends MinkContext implements Context
{

    private $user;

    private $em;

    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
         $this->kernel = $kernel;
         $this->em = $this->kernel->getContainer()->get('doctrine');
    }

    /**
     * @BeforeSuite
     */
    public static function beforeSuite()
    {
        StaticDriver::setKeepStaticConnections(true);
    }

    /**
     * @BeforeScenario
     */
    public function beforeScenario()
    {
        StaticDriver::beginTransaction();
    }

    /**
     * @AfterScenario
     */
    public function afterScenario()
    {
        StaticDriver::rollBack();
    }

    /**
     * @AfterSuite
     */
    public static function afterSuite()
    {
        StaticDriver::setKeepStaticConnections(false);
    }

    /**
     * @When I click in the connexion
     */
    public function iClickInTheConnexion()
    {
        $this->visit('/');
    }

    /**
     * @Given I created an account I receive an email to confirm my registration
     */
    public function iCreatedAnAccountIReceiveAnEmailToConfirmMyRegistration()
    {
        $accountParameter = new AccountParameter();
        $this->user = new User;
        $this->user->setUsername('username Testing');
        $this->user->setDescription('description Testing');
        $this->user->setCountry('country Testing');
        $this->user->setAddress('address Testing');
        $this->user->setName('name Testing');
        $this->user->setFirstName('firstName Testing');
        $this->user->setEmail('email Testing');
        $this->user->setDateCreate( new \DateTime());
        $this->user->setPassword('1');
        $this->user->setPasswordConfirm('1');
        $this->user->setTermsOfUse(true);
        $this->user->setRoles(['ROLE_USER']);
        $this->user->setConfirmation(0);
        $this->user->setAccountParameters($accountParameter);
        $this->user->setConfirmationKey('123');

        $manager = $this->em->getManager();
        $manager->persist($this->user);
        $manager->flush();
    }

    /**
     * @When I click on the email link
     */
    public function iClickOnTheEmailLink()
    {
        $this->visit('/confirmation/'.$this->user->getEmail().'/confirmationKey/'.$this->user->getConfirmationKey());
    }
}