<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $technologies=["PHP","Java"];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->setName($technology);
            $manager->persist($newTechnology);
            $manager->flush();
        }
    }
    public function getOrder()
    {
        return 3;
    }
}