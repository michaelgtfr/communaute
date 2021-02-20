<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 07/02/2021
 * Time: 13:09
 */

namespace App\Tests\Entity\Account;


use App\Entity\Account\Administrator;
use PHPUnit\Framework\TestCase;

class AdministratorTest extends TestCase
{
    public function testAdministratorEntity()
    {
        $administrator = new Administrator();

        $administrator->setWork('compagnyTest');

        $this->assertEquals(null, $administrator->getId());
        $this->assertEquals('compagnyTest', $administrator->getWork());
    }
}