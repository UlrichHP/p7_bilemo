<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
* Categories fixtures
*/
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            ['name'	=>	'smartphone'],
            ['name' =>	'accessory'],
            ['name' =>	'battery'],
            ['name' =>	'audio']
        ];

        foreach ($categories as $c) {
            $category = new Category();
            $category->setName($c['name']);
            $manager->persist($category);
            $this->addReference($c['name'], $category);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
