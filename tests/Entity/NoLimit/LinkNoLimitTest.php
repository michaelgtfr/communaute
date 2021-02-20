<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:18
 */

namespace App\Tests\Entity\NoLimit;


use App\Entity\NoLimit\LinkNoLimit;
use App\Entity\NoLimit\NoLimit;
use PHPUnit\Framework\TestCase;

class LinkNoLimitTest extends TestCase
{
    public function testLinkNoLimitEntity()
    {
        $linkNoLimit = new LinkNoLimit();
        $noLimit = new NoLimit();

        $linkNoLimit->setNoLimits($noLimit);

        $this->assertEquals(null, $linkNoLimit->getId());
        $this->assertEquals($noLimit, $linkNoLimit->getNoLimits());
    }
}