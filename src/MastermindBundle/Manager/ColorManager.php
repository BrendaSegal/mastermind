<?php
namespace MastermindBundle\Manager;

use Doctrine\ORM\EntityManager;
use MastermindBundle\Entity\Color;

class ColorManager
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createNewColor($colorName)
    {
        $em = $this->entityManager;

        if ($this->colorExists($colorName)) {
            return null;
        }

        $color = new Color();
        $color->setName($colorName);
        $em->persist($color);
        $em->flush();

        return $color;
    }

    public function renameColor($oldColorName, $newColorName)
    {
        $em = $this->entityManager;

        //first, make sure new color name doesn't already exist
        if ($this->colorExists($newColorName)) {
            return false;
        }

        //now, ensure the color to be replaced actually exists
        $oldColor = $this->findColor($oldColorName);

        if (is_null($oldColor)) {
            return null;
        }

        $oldColor->setName($newColorName);
        $em->flush();

        return $oldColor;
    }

    public function findColor($colorName)
    {
        $em = $this->entityManager;

        $colors = $em->getRepository('MastermindBundle:Color')
            ->findBy(array('name' => $colorName));

        if (empty($colors)) {
            return null;
        }

        return $colors[0];
    }

    
    public function colorExists($colorName)
    {
        return !is_null($this->findColor($colorName));
    }
}