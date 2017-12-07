<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Image;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
* images fixtures
*/
class LoadImageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $images = [
            [
                'link'	=>	'http://127.0.0.1:8000/img/products/smartphone1.png',
                'alt'	=>	'Smartphone 1'
            ],
            [
                'link'	=>	'http://127.0.0.1:8000/img/products/smartphone2.png',
                'alt'	=>	'Smartphone 2'
            ]
        ];

        foreach ($images as $i) {
            $image = new image();
            $image->setLink($i['link']);
            $image->setAlt($i['alt']);
            $manager->persist($image);
            $this->addReference($i['alt'], $image);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
