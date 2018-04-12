<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Trick;

class TrickImageDeleteListener
{

    protected $container;

    public function __construct(\Symfony\Component\DependencyInjection\Container $container)
    {
        $this->container = $container;
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Trick) {
            return;
        }

        $images = $entity->getImages();
        if (!empty($images) && isset($images)) {
            foreach ($images as $image) {
                $file_path = $this->container->getParameter('tricks_images_directory').'/'.$image->getUrl();
                if(file_exists($file_path)) unlink($file_path);
            }
        }
    }
}