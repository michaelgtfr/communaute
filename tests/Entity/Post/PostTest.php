<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 12:08
 */

namespace App\Tests\Entity\Post;


use App\Entity\Account\User;
use App\Entity\Post\CommentPost;
use App\Entity\Post\LinkPost;
use App\Entity\Post\PicturePost;
use App\Entity\Post\Post;
use App\Entity\Post\VideoPost;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testPostEntity()
    {
        $post = new Post();
        $user = new User();
        $commentPost = new CommentPost();
        $linkPost = new LinkPost();
        $picturePost = new PicturePost();
        $videoPost = new VideoPost();

        $dateTime = new \DateTime();
        $post->setDateTimePost($dateTime);
        $post->setLikePost(['2'=> '1']);
        $post->setUsers($user);
        $post->setCommentPost($commentPost);
        $post->setLinkPost($linkPost);
        $post->setPicturePost($picturePost);
        $post->setVideoPost($videoPost);

        $this->assertEquals(null, $post->getId());
        $this->assertEquals($dateTime, $post->getDateTimePost());
        $this->assertArrayHasKey('2', $post->getLikePost());
        $this->assertEquals($user, $post->getUsers());
        $this->assertEquals($commentPost, $post->getCommentPost());
        $this->assertEquals($linkPost, $post->getLinkPost());
        $this->assertEquals($picturePost, $post->getPicturePost());
        $this->assertEquals($videoPost, $post->getVideoPost());
    }
}