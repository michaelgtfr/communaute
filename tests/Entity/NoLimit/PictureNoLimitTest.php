<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:28
 */

namespace App\Tests\Entity\NoLimit;


use App\Entity\NoLimit\NoLimit;
use App\Entity\NoLimit\PictureNoLimit;
use PHPUnit\Framework\TestCase;

class PictureNoLimitTest extends TestCase
{
    public function testPictureNoLimit()
    {
        $pictureNoLimit = new PictureNoLimit();
        $noLimit = new NoLimit();

        $pictureNoLimit->setNoLimits($noLimit);

        $this->assertEquals(null, $pictureNoLimit->getId());
        $this->assertEquals($noLimit, $pictureNoLimit->getNoLimits());
    }
}