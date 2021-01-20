<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 19/01/2021
 * Time: 16:51
 */

namespace App\Services;


use App\Entity\Account\PictureUser;

class ProcessingFiles
{
    public function fileTreatment($completeNamePicture, $extensionFiles, $booleanProfil)
    {
        $picture = $this->processingFiles($completeNamePicture, $extensionFiles, 'pictureUser');

        $profilPicture = new PictureUser();
        $profilPicture->setName($picture['namePicture']);
        $profilPicture->setExtension($picture['extension']);
        $profilPicture->setProfilPicture($booleanProfil);

        return $profilPicture;
    }

    public function processingFiles($linkFile, $extensionFile, $folder)
    {
        //creation of the new name
        $datePicture = date('Y_m_d_H_i_s');
        $idUnique = uniqid();
        $namePhoto = "{$datePicture}-{$idUnique}.{$extensionFile}";

        //transfer
        $transferFile ="$folder/$namePhoto";
        move_uploaded_file($linkFile, $transferFile);

        return [
            'namePicture' => "{$datePicture}-{$idUnique}",
            'extension' => $extensionFile,
            ];
    }
}