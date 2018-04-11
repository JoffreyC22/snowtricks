<?php

namespace AppBundle\Service;

use AppBundle\Entity\Trick;
use AppBundle\Entity\Image;
use AppBundle\Entity\Video;
use Symfony\Component\HttpFoundation\Request;

class HandleMedias
{
    public static function handleImages(Request $request, UsersGetter $usersGetter, FileUploader $fileUploader, Trick $trick)
    {
        $images = $request->files->get('trick')['images']; /* Traitement images */
        if (empty($images)) return false;
        foreach ($images as $key => $file) {
            $filename = $fileUploader->upload($file['fichier']);
            if ($filename) {
                $image = new Image();
                $image->setUrl($filename);
                $image->setUser($usersGetter->getByUsername('joffreyc'));
                /** For now **/
                $trick->addImage($image);
            } else {
                return false;
            }
        }

        return true;
    }

    public static function handleVideos(Request $request, UsersGetter $usersGetter, Trick $trick)
    {
        $videos = $request->request->get('trick')['videos'];
        if (empty($videos)) return false;
        foreach ($videos as $video) {
            $embed = $video['video'];
            if (filter_var($embed, FILTER_VALIDATE_URL)) {
                $instanceVideo = new Video();
                $instanceVideo->setPath($embed);
                $instanceVideo->setUser($usersGetter->getByUsername('joffreyc'));
                /** For now **/
                $trick->addVideo($instanceVideo);
            } else {
                return false;
            }
        }

        return true;
    }
}