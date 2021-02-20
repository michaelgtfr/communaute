<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 09/02/2021
 * Time: 11:56
 */

namespace App\Tests\Entity\Post;


use App\Entity\Post\LinkPost;
use App\Entity\Post\NoteLinkPost;
use PHPUnit\Framework\TestCase;

class NoteLinkPostTest extends TestCase
{
    public function testNoteLinkPostEntity()
    {
        $noteLinkPost = new NoteLinkPost();
        $linkPost = new LinkPost();

        $noteLinkPost->setLinkPosts($linkPost);

        $this->assertEquals(null, $noteLinkPost->getId());
        $this->assertEquals($linkPost, $noteLinkPost->getLinkPosts());
    }
}