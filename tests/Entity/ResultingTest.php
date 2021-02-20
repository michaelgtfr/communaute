<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 14:40
 */

namespace App\Tests\Entity;


use App\Entity\Resulting;
use PHPUnit\Framework\TestCase;

class ResultingTest extends TestCase
{
    public function testResultingEntity()
    {
        $resulting = new Resulting();
        $dateTime = new \DateTime();

        $resulting->setNumberConnection(0);
        $resulting->setNumberPubAdded(1);
        $resulting->setDate($dateTime);

        $this->assertEquals(0, $resulting->getNumberConnection());
        $this->assertEquals(1, $resulting->getNumberPubAdded());
        $this->assertEquals($dateTime, $resulting->getDate());
    }
}
