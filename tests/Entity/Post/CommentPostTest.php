<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:33
 */

namespace App\Tests\Entity\Post;


use App\Entity\Post\CommentPost;
use App\Entity\Post\NoteCommentPost;
use App\Entity\Post\Post;
use PHPUnit\Framework\TestCase;

class CommentPostTest extends TestCase
{
    public function testCommentPostEntity()
    {
        $commentPost = new CommentPost();
        $post = new Post();
        $noteCommentPosts = new NoteCommentPost();

        $commentPost->setPosts($post);
        $commentPost->addNoteCommentPosts($noteCommentPosts);

        $this->assertEquals(null, $commentPost->getId());
        $this->assertEquals($post, $commentPost->getPosts());
        $this->assertEquals($noteCommentPosts, $commentPost->getNoteCommentPosts()[0]);
    }
}