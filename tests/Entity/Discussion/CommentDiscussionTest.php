<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 08/02/2021
 * Time: 22:46
 */

namespace App\Tests\Entity\Discussion;


use App\Entity\Discussion\CommentDiscussion;
use App\Entity\Discussion\Discussion;
use PHPUnit\Framework\TestCase;

class CommentDiscussionTest extends TestCase
{
    public function testCommentDiscussionEntity()
    {
        $commentDiscussion = new CommentDiscussion();
        $discussion = new Discussion();

        $commentDiscussion->setDiscussions($discussion);

        $this->assertEquals(null, $commentDiscussion->getId());
        $this->assertEquals($discussion, $commentDiscussion->getDiscussions());
    }
}