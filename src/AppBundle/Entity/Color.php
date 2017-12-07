<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 *
 * @ORM\Table(name="color")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ColorRepository")
 */
class Color
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="hex_code", type="string", length=7, unique=true)
     */
    private $hexCode;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Color
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set hexCode
     *
     * @param string $hexCode
     *
     * @return Color
     */
    public function setHexCode($hexCode)
    {
        $this->hexCode = $hexCode;

        return $this;
    }

    /**
     * Get hexCode
     *
     * @return string
     */
    public function getHexCode()
    {
        return $this->hexCode;
    }
}
