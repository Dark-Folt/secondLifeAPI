<?php

use App\Entity\Annonce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $annonce = new Annonce();
        $annonce->setTitre("Tire de l'annonce");
        $annonce->setPrix(465);
        $annonce->setPoids(43);
        $annonce->setEtat("neuf");
        $annonce->setIsValid(true);
        $manager->persist($annonce);

        $manager->flush();
    }
}
