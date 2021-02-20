<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 14:24
 */

namespace App\Tests\Entity;


use App\Entity\Matter;
use PHPUnit\Framework\TestCase;

class MatterTest extends TestCase
{
    public function testMatterEntity()
    {
        $matter = new Matter();
        $dateTime = new \DateTime();

        $matter->setMatter('matterTest');
        $matter->setDateMatter($dateTime);

        $this->assertEquals('matterTest', $matter->getMatter());
        $this->assertEquals($dateTime, $matter->getDateMatter());
    }
}