<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 07/02/2021
 * Time: 11:57
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testDisplayPage()
    {
        $client = static::createClient();

        $client->request('GET', '/register');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}