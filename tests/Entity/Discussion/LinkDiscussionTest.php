<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:04
 */

namespace App\Tests\Entity\Discussion;


use App\Entity\Discussion\Discussion;
use App\Entity\Discussion\Discussion\LinkDiscussion;
use PHPUnit\Framework\TestCase;

class LinkDiscussionTest extends TestCase
{
    public function testLinkDiscussionEntity()
    {
        $linkDiscussion = new LinkDiscussion();
        $discussion = new Discussion();

        $linkDiscussion->setDiscussions($discussion);

        $this->assertEquals(null, $linkDiscussion->getId());
        $this->assertEquals($discussion, $linkDiscussion->getDiscussions());
    }
}