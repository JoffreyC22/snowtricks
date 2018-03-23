<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddTrickControllerTest extends WebTestCase
{
    public function addAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tricks/add');
    }
}
