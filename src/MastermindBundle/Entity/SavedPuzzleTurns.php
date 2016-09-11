<?php
namespace MastermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="saved_puzzle_turns")
 */

class SavedPuzzleTurns
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $turnNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $slotNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Color")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     */
    private $colorId;

    /**
     * @ORM\ManyToOne(targetEntity="Puzzle")
     * @ORM\JoinColumn(name="puzzle_id", referencedColumnName="id")
     */
    private $puzzleId;

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
     * @return SavedPuzzleTurns
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
     * Set slotNumber
     *
     * @param integer $slotNumber
     *
     * @return SavedPuzzleTurns
     */
    public function setSlotNumber($slotNumber)
    {
        $this->slotNumber = $slotNumber;

        return $this;
    }

    /**
     * Get slotNumber
     *
     * @return integer
     */
    public function getSlotNumber()
    {
        return $this->slotNumber;
    }

    /**
     * Set colorId
     *
     * @param \MastermindBundle\Entity\Color $colorId
     *
     * @return SavedPuzzleTurns
     */
    public function setColorId(\MastermindBundle\Entity\Color $colorId = null)
    {
        $this->colorId = $colorId;

        return $this;
    }

    /**
     * Get colorId
     *
     * @return \MastermindBundle\Entity\Color
     */
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * Set puzzleId
     *
     * @param \MastermindBundle\Entity\Puzzle $puzzleId
     *
     * @return SavedPuzzleTurns
     */
    public function setPuzzleId(\MastermindBundle\Entity\Puzzle $puzzleId = null)
    {
        $this->puzzleId = $puzzleId;

        return $this;
    }

    /**
     * Get puzzleId
     *
     * @return \MastermindBundle\Entity\Puzzle
     */
    public function getPuzzleId()
    {
        return $this->puzzleId;
    }
}
