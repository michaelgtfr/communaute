<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 13:42
 */

namespace App\Tests\Entity\Pub;


use App\Entity\Pub\LinkPub;
use App\Entity\Pub\Publicity;
use PHPUnit\Framework\TestCase;

class LinkPubTest extends TestCase
{
    public function testLinkPubEntity()
    {
        $linkPub = new LinkPub();
        $publicity = new Publicity();

        $linkPub->setPublicitys($publicity);

        $this->assertEquals(null, $linkPub->getId());
        $this->assertEquals($publicity, $linkPub->getPublicitys());
    }
}