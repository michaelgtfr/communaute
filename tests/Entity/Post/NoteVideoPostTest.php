<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 12:05
 */

namespace App\Tests\Entity\Post;


use App\Entity\Post\NotePicturePost;
use App\Entity\Post\PicturePost;
use PHPUnit\Framework\TestCase;

class NoteVideoPostTest extends TestCase
{
    public function testNotePicturePostEntity()
    {
        $notePicturePost = new NotePicturePost();
        $picturePost = new PicturePost();

        $notePicturePost->setPicturePosts($picturePost);

        $this->assertEquals(null, $notePicturePost->getId());
        $this->assertEquals($picturePost, $notePicturePost->getPicturePosts());
    }
}