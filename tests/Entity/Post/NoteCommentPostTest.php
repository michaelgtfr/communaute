<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:52
 */

namespace App\Tests\Entity\Post;


use App\Entity\Post\CommentPost;
use App\Entity\Post\NoteCommentPost;
use PHPUnit\Framework\TestCase;

class NoteCommentPostTest extends TestCase
{
    public function testNoteCommentPostEntity()
    {
        $noteCommentPost = new NoteCommentPost();
        $commentPost = new CommentPost();

        $noteCommentPost->setCommentPosts($commentPost);

        $this->assertEquals(null, $noteCommentPost->getId());
        $this->assertEquals($commentPost, $noteCommentPost->getCommentPosts());
    }
}