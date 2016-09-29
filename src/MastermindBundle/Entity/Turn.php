<?php
namespace MastermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="turn",uniqueConstraints={@ORM\UniqueConstraint(name="saved_turn_slot_idx", columns={"saved_puzzle_progress_id", "slot_position", "turn_number"})})
 */
class Turn
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SavedPuzzleProgress", inversedBy="turns")
     * @ORM\JoinColumn(name="saved_puzzle_progress_id", referencedColumnName="id", nullable=false)
     */
     private $savedPuzzleProgress;

     /**
      * @ORM\Column(type="integer", nullable=false)
      */
     private $turnNumber;

     /**
      * @ORM\Column(type="integer", nullable=false)
      */
     private $slotPosition;

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
     * Set turnNumber
     *
     * @param integer $turnNumber
     *
     * @return Turn
     */
    public function setTurnNumber($turnNumber)
    {
        $this->turnNumber = $turnNumber;

        return $this;
    }

    /**
     * Get turnNumber
     *
     * @return integer
     */
    public function getTurnNumber()
    {
        return $this->turnNumber;
    }

    /**
     * Set slotPosition
     *
     * @param integer $slotPosition
     *
     * @return Turn
     */
    public function setSlotPosition($slotPosition)
    {
        $this->slotPosition = $slotPosition;

        return $this;
    }

    /**
     * Get slotPosition
     *
     * @return integer
     */
    public function getSlotPosition()
    {
        return $this->slotPosition;
    }

    /**
     * Set savedPuzzleProgress
     *
     * @param \MastermindBundle\Entity\SavedPuzzleProgress $savedPuzzleProgress
     *
     * @return Turn
     */
    public function setSavedPuzzleProgress(\MastermindBundle\Entity\SavedPuzzleProgress $savedPuzzleProgress)
    {
        $this->savedPuzzleProgress = $savedPuzzleProgress;

        return $this;
    }

    /**
     * Get savedPuzzleProgress
     *
     * @return \MastermindBundle\Entity\SavedPuzzleProgress
     */
    public function getSavedPuzzleProgress()
    {
        return $this->savedPuzzleProgress;
    }

    /**
     * Set color
     *
     * @param \MastermindBundle\Entity\Color $color
     *
     * @return Turn
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
