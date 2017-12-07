<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Color;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
* Colors fixtures
*/
class LoadColorData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $colors = [
            [
                'name'		=>	'black',
                'hexCode'	=>	'#000000'
            ],
            [
                'name'		=>	'white',
                'hexCode'	=>	'#ffffff'
            ]
        ];

        foreach ($colors as $c) {
            $color = new Color();
            $color->setName($c['name']);
            $color->setHexCode($c['hexCode']);
            $manager->persist($color);
            $this->addReference($c['name'], $color);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
