<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:49
 */

namespace App\Tests\Entity\Post;


use App\Entity\Post\NoteVideoPost;
use App\Entity\Post\Post;
use App\Entity\Post\VideoPost;
use PHPUnit\Framework\TestCase;

class VideoPostTest extends TestCase
{
    public function testVideoPostEntity()
    {
        $videoPost = new VideoPost();
        $post = new Post();
        $noteVideoPosts = new NoteVideoPost();

        $videoPost->setPosts($post);
        $videoPost->addNoteVideoPosts($noteVideoPosts);

        $this->assertEquals(null, $videoPost->getId());
        $this->assertEquals($post, $videoPost->getPosts());
        $this->assertEquals($noteVideoPosts, $videoPost->getNoteVideoPosts()[0]);
    }
}