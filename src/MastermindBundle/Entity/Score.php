<?php
namespace MastermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="score")
 */

class Score
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberTurns;

    /**
     * @ORM\ManyToOne(targetEntity="Puzzle")
     * @ORM\JoinColumn(name="puzzle_id", referencedColumnName="id")
     */
    private $puzzleId;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Score
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set numberTurns
     *
     * @param integer $numberTurns
     *
     * @return Score
     */
    public function setNumberTurns($numberTurns)
    {
        $this->numberTurns = $numberTurns;

        return $this;
    }

    /**
     * Get numberTurns
     *
     * @return integer
     */
    public function getNumberTurns()
    {
        return $this->numberTurns;
    }

    /**
     * Set puzzleId
     *
     * @param \MastermindBundle\Entity\Puzzle $puzzleId
     *
     * @return Score
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

    /**
     * Set userId
     *
     * @param \MastermindBundle\Entity\User $userId
     *
     * @return Score
     */
    public function setUserId(\MastermindBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \MastermindBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
