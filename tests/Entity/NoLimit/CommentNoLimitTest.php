<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:14
 */

namespace App\Tests\Entity\NoLimit;


use App\Entity\NoLimit\CommentNoLimit;
use App\Entity\NoLimit\NoLimit;
use PHPUnit\Framework\TestCase;

class CommentNoLimitTest extends TestCase
{
    public function testCommentNoLimitEntity()
    {
        $commentNoLimit = new CommentNoLimit();
        $noLimit = new NoLimit();

        $commentNoLimit->setNoLimits($noLimit);

        $this->assertEquals(null, $commentNoLimit->getId());
        $this->assertEquals($noLimit, $commentNoLimit->getNoLimits());
    }
}