<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 13:44
 */

namespace App\Tests\Entity\Pub;


use App\Entity\Pub\PicturePub;
use App\Entity\Pub\Publicity;
use PHPUnit\Framework\TestCase;

class PicturePubTest extends TestCase
{
    public function testPicturePubEntity()
    {
        $picturePub = new PicturePub();
        $publicity = new Publicity();

        $picturePub->setPublicitys($publicity);

        $this->assertEquals(null, $picturePub->getId());
        $this->assertEquals($publicity, $picturePub->getPublicitys());
    }
}