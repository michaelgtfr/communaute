<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:20
 */

namespace App\Tests\Entity\NoLimit;


use App\Entity\Account\User;
use App\Entity\NoLimit\CommentNoLimit;
use App\Entity\NoLimit\LinkNoLimit;
use App\Entity\NoLimit\NoLimit;
use App\Entity\NoLimit\PictureNoLimit;
use App\Entity\NoLimit\VideoNoLimit;
use PHPUnit\Framework\TestCase;

class NoLimitTest extends TestCase
{
    public function testNoLimitEntity()
    {
        $noLimit = new NoLimit();
        $user = new User();
        $commentNoLimit = new CommentNoLimit();
        $linkNoLimit = new LinkNoLimit();
        $videoNoLimit = new VideoNoLimit();
        $pictureNoLimit = new PictureNoLimit();
        $dateTime = new \DateTime();

        $noLimit->setDateCreate($dateTime);
        $noLimit->setUsers($user);
        $noLimit->setCommentNoLimit($commentNoLimit);
        $noLimit->setLinkNoLimit($linkNoLimit);
        $noLimit->setPictureNoLimit($pictureNoLimit);
        $noLimit->setVideoNoLimit($videoNoLimit);

        $this->assertEquals(null, $noLimit->getId());
        $this->assertEquals($user, $noLimit->getUsers());
        $this->assertEquals($commentNoLimit, $noLimit->getCommentNoLimit());
        $this->assertEquals($linkNoLimit, $noLimit->getLinkNoLimit());
        $this->assertEquals($videoNoLimit, $noLimit->getVideoNoLimit());
        $this->assertEquals($pictureNoLimit, $noLimit->getPictureNoLimit());
        $this->assertEquals($dateTime, $noLimit->getDateCreate());
    }
}
