<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddTrickControllerTest extends WebTestCase
{
    public function testViewadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tricks/add');
    }

    public function testPostadd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tricks/add');
    }

}
