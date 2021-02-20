<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 08/02/2021
 * Time: 13:40
 */

namespace App\Tests\Entity\Account;


use App\Entity\Account\AccountParameter;
use App\Entity\Account\Friends;
use App\Entity\Account\PictureUser;
use App\Entity\Account\User;
use App\Entity\Discussion\Discussion;
use App\Entity\NoLimit\NoLimit;
use App\Entity\Post\Post;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserEntity()
    {
        $user = new User();
        $post = new Post();
        $discussion = new Discussion();
        $accountParameter = new AccountParameter();
        $pictureUser = new PictureUser();
        $friends = new Friends();
        $noLimit = new NoLimit();

        $user->setUsername('usernameTest');
        $user->setDescription('descriptionTest');
        $user->setRoles(['ROLES_USER']);
        $user->setCountry('france');
        $user->setAddress('addressTest');
        $user->setCompletePictureName('complementPictureNameTest');
        $user->addPosts($post);
        $user->addDiscussions($discussion);
        $user->setAccountParameters($accountParameter);
        $user->addPictureUsers($pictureUser);
        $user->setFriends($friends);
        $user->addNoLimits($noLimit);

        $this->assertEquals(null, $user->getId());
        $this->assertEquals('usernameTest', $user->getUsername());
        $this->assertEquals('descriptionTest', $user->getDescription());
        $this->assertArrayNotHasKey('ROLE_USER', $user->getRoles());
        $this->assertEquals('france', $user->getCountry());
        $this->assertEquals('addressTest', $user->getAddress());
        $this->assertEquals('complementPictureNameTest', $user->getCompletePictureName());
        $this->assertEquals($post, $user->getPosts()[0]);
        $this->assertEquals($discussion, $user->getDiscussions()[0]);
        $this->assertEquals($accountParameter, $user->getAccountParameters());
        $this->assertEquals($pictureUser, $user->getPictureUsers()[0]);
        $this->assertEquals($friends, $user->getFriends());
        $this->assertEquals($noLimit, $user->getNoLimits()[0]);
    }
}