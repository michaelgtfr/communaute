<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:46
 */

namespace App\Tests\Entity\Post;


use App\Entity\Post\NotePicturePost;
use App\Entity\Post\PicturePost;
use App\Entity\Post\Post;
use PHPUnit\Framework\TestCase;

class PicturePostTest extends TestCase
{
    public function testPicturePostTest()
    {
        $picturePost = new PicturePost();
        $post = new Post();
        $notePicturePosts = new NotePicturePost();

        $picturePost->setPosts($post);
        $picturePost->addNotePicturePosts($notePicturePosts);

        $this->assertEquals(null, $picturePost->getId());
        $this->assertEquals($post, $picturePost->getPosts());
        $this->assertEquals($notePicturePosts, $picturePost->getNotePicturePosts()[0]);
    }
}