<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 07/02/2021
 * Time: 12:19
 */

namespace App\Tests\Entity\Account;


use App\Entity\Account\AccountParameter;
use App\Entity\Account\User;
use PHPUnit\Framework\TestCase;

class AccountParameterTest extends TestCase
{
    public function testAccountParameterEntity()
    {
        $accountParameter = new AccountParameter();
        $user = new User();

        $accountParameter->setChoicePubs(['1' => '1']);
        $accountParameter->setChoiceNews(['1' => '1']);
        $accountParameter->setChoiceParameter(['1' => '1']);
        $accountParameter->setUsers($user);

        $this->assertEquals('1', $accountParameter->getChoicePubs()['1']);
        $this->assertEquals('1', $accountParameter->getChoiceNews()['1']);
        $this->assertEquals('1', $accountParameter->getChoiceParameter()['1']);
        $this->assertEquals($user, $accountParameter->getUsers());
        $this->assertEquals(null, $accountParameter->getId());
    }

}