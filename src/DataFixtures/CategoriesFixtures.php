<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {
        $this->createCategory('Manga', 1, $manager);
        $this->createCategory('Literature et Fiction', 2, $manager);
        $this->createCategory('Art, musique', 3, $manager);
        $this->createCategory('Culture, Societe', 4, $manager);
        $this->createCategory('Sport', 5, $manager);
        $this->createCategory('Loisirs', 6, $manager);
        $this->createCategory('Cuisine', 7, $manager);
        $this->createCategory('Langues', 8, $manager);
        $this->createCategory('Pour les petites', 9, $manager);
        $manager->flush();
    }


    public function createCategory(string $name, int $catId, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $manager->persist($category);

        $catId = $this->addReference('cat-' . $this->counter, $category);
        $this->counter++;


        return $category;
    }
}
