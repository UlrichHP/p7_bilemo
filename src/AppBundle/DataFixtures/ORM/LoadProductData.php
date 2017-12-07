<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
* Products fixtures
*/
class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    { 
        $products[] = [
            'name'			=>	'Samtang',
            'size'			=>	'5"',
            'weight'		=>	'280 gr',
            'description' 	=>	'Smartphone haut de gamme !',
            'price'			=>	599.99,
            'category'		=>  $this->getReference('smartphone')
        ];

        $products[] = [
            'name'			=>	'cable usb',
            'size'			=>	'30cm',
            'weight'		=>	'20 gr',
            'description' 	=>	'Super cable pour recharger vos équipements.',
            'price'			=>	15.99,
            'category'		=>  $this->getReference('accessory')
        ];

        $products[] = [
            'name'			=>	'Sonyx Z-25',
            'size'			=>	'5.5"',
            'weight'		=>	'320 gr',
            'description' 	=>	'Smartphone dernier cri !',
            'price'			=>	795.99,
            'category'		=>  $this->getReference('smartphone')
        ];

        $products[] = [
            'name'			=>	'Batterie Nokia 3310',
            'size'			=>	'9cm',
            'weight'		=>	'15 gr',
            'description' 	=>	'Batterie avec son chargeur pour le super Nokia 3310.',
            'price'			=>	45.99,
            'category'		=>  $this->getReference('battery')
        ];
        
        $products[] = [
            'name'			=>	'Ecouteurs Pomme XII',
            'size'			=>	'1m',
            'weight'		=>	'26 gr',
            'description' 	=>	'Tout nouveaux écouteurs pour le smartphone Pomme XII !',
            'price'			=>	89.99,
            'category'		=>  $this->getReference('audio')
        ];
        
        for ($i=1; $i < 26; $i++) { 
            $products[] = [
                'name'			=>	'Samtang Universe B'.$i,
                'size'			=>	'5.2"',
                'weight'		=>	'200 gr',
                'description' 	=>	'Nouveaux smartphones Samtang Universe modèle B !!!',
                'price'			=>	99.99 + ($i*5),
                'category'		=>  $this->getReference('smartphone')
            ];
        }

        foreach ($products as $p) {
            $product = new Product();
            foreach ($p as $key => $value) {
                $setter = 'set'.ucfirst($key);
                if (is_callable([$product, $setter])) {
                    $product->$setter($value);
                }
            }
            $product->addColor($this->getReference('black'));
            $product->addColor($this->getReference('white'));
            $product->addImage($this->getReference('Smartphone 1'));
            $product->addImage($this->getReference('Smartphone 2'));
            $manager->persist($product);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}
