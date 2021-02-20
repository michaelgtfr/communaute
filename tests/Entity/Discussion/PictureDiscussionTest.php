<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:09
 */

namespace App\Tests\Entity\Discussion;


use App\Entity\Discussion\Discussion;
use App\Entity\Discussion\PictureDiscussion;
use PHPUnit\Framework\TestCase;

class PictureDiscussionTest extends TestCase
{
    public function testPictureDiscussionEntity()
    {
        $pictureDiscussion = new PictureDiscussion();
        $discussion = new Discussion();

        $pictureDiscussion->setDiscussions($discussion);

        $this->assertEquals(null, $pictureDiscussion->getId());
        $this->assertEquals($discussion, $pictureDiscussion->getDiscussions());
    }
}