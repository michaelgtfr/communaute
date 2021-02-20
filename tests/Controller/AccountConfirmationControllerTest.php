<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 12/02/2021
 * Time: 11:02
 */

namespace App\Tests\Controller;


use App\DataFixtures\AppFixtures;
use App\Entity\Account\User;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AccountConfirmationControllerTest extends WebTestCase
{
    use FixturesTrait;

    private $fixtures;
    private $user;

    protected function dataFixture()
    {
        $this->fixtures = $this->loadFixtures([
            AppFixtures::class,
        ])->getReferenceRepository();

        $this->user = self::$container->get('doctrine')->getRepository(User::class)
            ->find($this->fixtures->getReference('user')->getId());
    }

    public function testAccountConfirmationController()
    {
        $client = static::createClient();

        $this->dataFixture();

        $email = $this->user->getEmail();
        $confirmationKey = $this->user->getConfirmationKey();

        $client->request('GET', '/confirmation/'.$email.'/confirmationKey/'.$confirmationKey);

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}
