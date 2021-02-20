<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 08/02/2021
 * Time: 13:32
 */

namespace App\Tests\Entity\Account;


use App\Entity\Account\PictureUser;
use App\Entity\Account\User;
use PHPUnit\Framework\TestCase;

class PictureUserTest extends TestCase
{
    public function testPictureUserEntity()
    {
        $pictureUser = new PictureUser();
        $user = new User();

        $pictureUser->setUsers($user);
        $pictureUser->setName('nameTest');
        $pictureUser->setProfilPicture(true);
        $pictureUser->setExtension('jpg');
        $pictureUser->setDescription('descriptionTest');

        $this->assertEquals(null, $pictureUser->getId());
        $this->assertEquals('nameTest', $pictureUser->getName());
        $this->assertEquals('jpg', $pictureUser->getExtension());
        $this->assertEquals('descriptionTest', $pictureUser->getDescription());
        $this->assertEquals($user, $pictureUser->getUsers());
    }
}
