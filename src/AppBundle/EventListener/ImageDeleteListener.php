<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Image;

class ImageDeleteListener
{

    protected $container;

    public function __construct(\Symfony\Component\DependencyInjection\Container $container)
    {
        $this->container = $container;
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Image) {
            return;
        }

        $file_path = $this->container->getParameter('tricks_images_directory').'/'.$entity->getUrl();
        if(file_exists($file_path)) unlink($file_path);
    }
}