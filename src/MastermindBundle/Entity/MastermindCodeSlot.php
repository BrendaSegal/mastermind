<?php
namespace MastermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="mastermind_code_slot")
 */
class MastermindCodeSlot
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Puzzle", inversedBy="mastermindCodeSlots")
     * @ORM\JoinColumn(name="puzzle_id", referencedColumnName="id", nullable=false)
     */
     private $puzzle;

     /**
      * @ORM\Column(type="integer", nullable=false)
      */
     private $slotXPosition;

     /**
      * @ORM\ManyToOne(targetEntity="Color")
      * @ORM\JoinColumn(name="color_id", referencedColumnName="id", nullable=false)
      */
     private $color;
     

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set slotXPosition
     *
     * @param integer $slotXPosition
     *
     * @return MastermindCodeSlot
     */
    public function setSlotXPosition($slotXPosition)
    {
        $this->slotXPosition = $slotXPosition;

        return $this;
    }

    /**
     * Get slotXPosition
     *
     * @return integer
     */
    public function getSlotXPosition()
    {
        return $this->slotXPosition;
    }

    /**
     * Set puzzle
     *
     * @param \MastermindBundle\Entity\Puzzle $puzzle
     *
     * @return MastermindCodeSlot
     */
    public function setPuzzle(\MastermindBundle\Entity\Puzzle $puzzle)
    {
        $this->puzzle = $puzzle;

        return $this;
    }

    /**
     * Get puzzle
     *
     * @return \MastermindBundle\Entity\Puzzle
     */
    public function getPuzzle()
    {
        return $this->puzzle;
    }

    /**
     * Set color
     *
     * @param \MastermindBundle\Entity\Color $color
     *
     * @return MastermindCodeSlot
     */
    public function setColor(\MastermindBundle\Entity\Color $color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \MastermindBundle\Entity\Color
     */
    public function getColor()
    {
        return $this->color;
    }
}
