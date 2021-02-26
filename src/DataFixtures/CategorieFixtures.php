<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $categories = ['Jeux vidéos', 'Smartphone', 'Écran', 'Câbles', 'Télévision', 'Électroménager'];

        foreach ($categories as $categorie) {
            $cat = new Categorie();
            $cat->setNom($categorie);
            $manager->persist($cat);
        }

        $manager->flush();
    }
}
