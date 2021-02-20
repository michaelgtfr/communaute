<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 07/02/2021
 * Time: 11:55
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testDisplayPage()
    {
        $client = static::createClient();

        $client->request('GET', '/contact');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}