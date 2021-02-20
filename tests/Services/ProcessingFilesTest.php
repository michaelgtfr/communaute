<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 11/02/2021
 * Time: 13:30
 */

namespace App\Tests\Services;


use App\Services\ProcessingFiles;
use PHPUnit\Framework\TestCase;

class ProcessingFilesTest extends TestCase
{
    protected $mock;

    protected $data;

    public function testProcessingTest()
    {
        $this->data = [
            'namePicture' => 'nameTest',
            'extension' => 'jpg'
        ];

        $processingFile = new ProcessingFiles();
        $returnProcessingFile = $processingFile->fileTreatment('completeTestname.jpg', 'jpg', 1);

        $this->assertEquals($this->data['extension'], $returnProcessingFile->getExtension());
        $this->assertEquals(1, $returnProcessingFile->getProfilPicture());
    }
}