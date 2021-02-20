<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 12:22
 */

namespace App\Tests\Entity\Pub;


use App\Entity\Pub\CommentPub;
use App\Entity\Pub\Publicity;
use PHPUnit\Framework\TestCase;

class CommentPubTest extends TestCase
{
    public function testCommentPubEntity()
    {
        $commentPub = new CommentPub();
        $publicity = new Publicity();

        $commentPub->setPublicitys($publicity);

        $this->assertEquals(null, $commentPub->getId());
        $this->assertEquals($publicity, $commentPub->getPublicitys());
    }
}