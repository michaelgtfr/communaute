<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 13:47
 */

namespace App\Tests\Entity\Pub;


use App\Entity\Account\Editor;
use App\Entity\Pub\CommentPub;
use App\Entity\Pub\LinkPub;
use App\Entity\Pub\PicturePub;
use App\Entity\Pub\Publicity;
use App\Entity\Pub\VideoPub;
use PHPUnit\Framework\TestCase;

class PublicityTest extends TestCase
{
    public function testPublicityEntity()
    {
        $publicity = new Publicity();
        $editor = new Editor();
        $picturePub = new PicturePub();
        $videoPub = new VideoPub();
        $linkPub = new LinkPub();
        $commentPub = new CommentPub();
        $dateTime = new \DateTime();

        $publicity->setNumberViewsActual('1');
        $publicity->setNumberViewsMax('100');
        $publicity->setDateCreate($dateTime);
        $publicity->setPrice('100');
        $publicity->setStatus('1');
        $publicity->setEditors($editor);
        $publicity->addPicturePub($picturePub);
        $publicity->addCommentPub($commentPub);
        $publicity->addVideoPub($videoPub);
        $publicity->addLinkPub($linkPub);

        $this->assertEquals(null, $publicity->getId());
        $this->assertEquals('1', $publicity->getNumberViewsActual());
        $this->assertEquals('100', $publicity->getNumberViewsMax());
        $this->assertEquals($dateTime, $publicity->getDateCreate());
        $this->assertEquals('100', $publicity->getPrice());
        $this->assertEquals('1', $publicity->getStatus());
        $this->assertEquals($editor, $publicity->getEditors());
        $this->assertEquals($picturePub, $publicity->getPicturePub()[0]);
        $this->assertEquals($videoPub, $publicity->getVideoPub()[0]);
        $this->assertEquals($linkPub, $publicity->getLinkPub()[0]);
        $this->assertEquals($commentPub,$publicity->getCommentPub()[0]);
    }
}