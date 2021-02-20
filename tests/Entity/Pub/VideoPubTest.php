<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 13:46
 */

namespace App\Tests\Entity\Pub;


use App\Entity\Pub\Publicity;
use App\Entity\Pub\VideoPub;
use PHPUnit\Framework\TestCase;

class VideoPubTest extends TestCase
{
    public function testCommentPubEntity()
    {
        $videoPub = new VideoPub();
        $publicity = new Publicity();

        $videoPub->setPublicitys($publicity);

        $this->assertEquals(null, $videoPub->getId());
        $this->assertEquals($publicity, $videoPub->getPublicitys());
    }
}