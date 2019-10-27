<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Classe;
use App\Entity\Container;
use App\Entity\SuperClass;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class PolyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i = 0; $i < 15; $i++) {
            $c = new Container("Titre de container $i");
            $manager->persist($c);
        }

        $manager->flush();

        for($i = 0; $i < 15; $i++) {
            $a = new Article("Titre d'artcile $i","texte d'article");
            $manager->persist($a);
        }

        $manager->flush();
    }
}
