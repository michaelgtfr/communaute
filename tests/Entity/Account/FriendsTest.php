<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 08/02/2021
 * Time: 13:12
 */

namespace App\Tests\Entity\Account;


use App\Entity\Account\Friends;
use App\Entity\Account\User;
use PHPUnit\Framework\TestCase;

class FriendsTest extends TestCase
{
    public function testFriendsEntity()
    {
        $friends = new Friends();
        $user = new User();

        $friends->setUsers($user);
        $friends->setFriendsId(['1']);
        $friends->setFriendRequest(['2' => '1']);

        $this->assertEquals(null, $friends->getId());
        $this->assertEquals($user, $friends->getUsers());
        $this->assertArrayNotHasKey('1', $friends->getFriendsId());
        $this->assertArrayHasKey('2', $friends->getFriendRequest());
    }
}