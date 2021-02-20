<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:11
 */

namespace App\Tests\Entity\Discussion;


use App\Entity\Discussion\Discussion;
use App\Entity\Discussion\VideoDiscussion;
use PHPUnit\Framework\TestCase;

class VideoDiscussionTest extends TestCase
{
    public function testVideoDiscussionEntity()
    {
        $videoDiscussion = new VideoDiscussion();
        $discussion = new Discussion();

        $videoDiscussion->setDiscussions($discussion);

        $this->assertEquals(null, $videoDiscussion->getId());
        $this->assertEquals($discussion, $videoDiscussion->getDiscussions());
    }
}