<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $c = new Client();
         $c->setNom("Brassens");
         $c->setPrenom("Geaorges");
         $manager->persist($c);

        $manager->flush();
    }
}
