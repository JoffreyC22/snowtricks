<?php
// src/AppBundle/Service/FileUploader.php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        $extension = $file->guessExtension();
        if (in_array($extension, $this->getAuthorizedTypes())) {
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getTargetDirectory(), $fileName);

            return $fileName;
        }

        return;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    private function getAuthorizedTypes()
    {
        $authorized = [
            'png',
            'jpg',
            'jpeg'
        ];

        return $authorized;
    }
}