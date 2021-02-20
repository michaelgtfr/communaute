<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 07/02/2021
 * Time: 15:46
 */

namespace App\Tests\Entity\Account;


use App\Entity\Account\Editor;
use App\Entity\Pub\Publicity;
use PHPUnit\Framework\TestCase;

class EditorTest extends TestCase
{
    public function testEditorEntity()
    {
        $editor = new Editor();
        $pub = new Publicity();

        $editor->setCompagny('compagnyTest');
        $editor->setSocialAddress('social adresse test');
        $editor->addPublicity($pub);

        $this->assertEquals(null, $editor->getId());
        $this->assertEquals('compagnyTest', $editor->getCompagny());
        $this->assertEquals('social adresse test', $editor->getSocialAddress());
        $this->assertSame($pub, $editor->getPublicity()[0]);

        $editor->removePublicity($pub);

        $this->assertSame(null, $editor->getPublicity()[0]);
    }
}