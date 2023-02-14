<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $image = new Images();
        $image->setName('book1.png');
        $product = $this->getReference('prod-1');
        $image->setProducts($product);
        $manager->persist($image);

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [
            ProductsFixtures::class
        ];
    }
}
