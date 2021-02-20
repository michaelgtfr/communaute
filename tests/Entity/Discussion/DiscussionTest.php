<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 08/02/2021
 * Time: 22:51
 */

namespace App\Tests\Entity\Discussion;


use App\Entity\Account\User;
use App\Entity\Discussion\CommentDiscussion;
use App\Entity\Discussion\Discussion;
use App\Entity\Discussion\Discussion\LinkDiscussion;
use App\Entity\Discussion\PictureDiscussion;
use App\Entity\Discussion\VideoDiscussion;
use PHPUnit\Framework\TestCase;

class DiscussionTest extends TestCase
{
    public function testDiscussionEntity()
    {
        $discussion = new Discussion();
        $user = new User();
        $commentDiscussion = new CommentDiscussion();
        $linkDiscussion = new LinkDiscussion();
        $videoDiscussion = new VideoDiscussion();
        $pictureDiscussion = new PictureDiscussion();

        $data = new \DateTime();
        $discussion->setDateCreate($data);
        $discussion->setUsers($user);
        $discussion->setCommentDiscussion($commentDiscussion);
        $discussion->setLinkDiscussion($linkDiscussion);
        $discussion->setVideoDiscussion($videoDiscussion);
        $discussion->setPictureDiscussion($pictureDiscussion);

        $this->assertEquals(null, $discussion->getId());
        $this->assertEquals($data, $discussion->getDateCreate());
        $this->assertEquals($user, $discussion->getUsers());
        $this->assertEquals($commentDiscussion, $discussion->getCommentDiscussion());
        $this->assertEquals($linkDiscussion, $discussion->getLinkDiscussion());
        $this->assertEquals($videoDiscussion, $discussion->getVideoDiscussion());
        $this->assertEquals($pictureDiscussion, $discussion->getPictureDiscussion());
    }
}
