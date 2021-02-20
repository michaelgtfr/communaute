<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:31
 */

namespace App\Tests\Entity\NoLimit;


use App\Entity\NoLimit\NoLimit;
use App\Entity\NoLimit\VideoNoLimit;

class VideoNoLimitTest
{
    public function testVideoNoLimit()
    {
        $videoNoLimit = new VideoNoLimit();
        $noLimit = new NoLimit();

        $videoNoLimit->setNoLimits($noLimit);

        $this->assertEquals(null, $videoNoLimit->getId());
        $this->assertEquals($noLimit, $videoNoLimit->getNoLimits());
    }
}