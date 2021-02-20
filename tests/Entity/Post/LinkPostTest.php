<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:38
 */

namespace App\Tests\Entity\Post;


use App\Entity\Post\LinkPost;
use App\Entity\Post\NoteLinkPost;
use App\Entity\Post\Post;
use PHPUnit\Framework\TestCase;

class LinkPostTest extends TestCase
{
    public function testLinkPostEntity()
    {
        $linkPost = new LinkPost();
        $post = new Post();
        $noteLinkPosts = new NoteLinkPost();

        $linkPost->setPosts($post);
        $linkPost->addNoteLinkPosts($noteLinkPosts);

        $this->assertEquals(null, $linkPost->getId());
        $this->assertEquals($post, $linkPost->getPosts());
        $this->assertEquals($noteLinkPosts, $linkPost->getNoteLinkPosts()[0]);
    }
}