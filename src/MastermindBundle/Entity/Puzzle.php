<?php
namespace MastermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="puzzle")
 */

class Puzzle
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
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $timesAttempted;

    /**
     * @ORM\Column(type="integer")
     */
    private $timesWon;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="generated_by_user_id", referencedColumnName="id")
     */
    private $generatedByUserId;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Puzzle
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set timesAttempted
     *
     * @param integer $timesAttempted
     *
     * @return Puzzle
     */
    public function setTimesAttempted($timesAttempted)
    {
        $this->timesAttempted = $timesAttempted;

        return $this;
    }

    /**
     * Get timesAttempted
     *
     * @return integer
     */
    public function getTimesAttempted()
    {
        return $this->timesAttempted;
    }

    /**
     * Set timesWon
     *
     * @param integer $timesWon
     *
     * @return Puzzle
     */
    public function setTimesWon($timesWon)
    {
        $this->timesWon = $timesWon;

        return $this;
    }

    /**
     * Get timesWon
     *
     * @return integer
     */
    public function getTimesWon()
    {
        return $this->timesWon;
    }

    /**
     * Set generatedByUserId
     *
     * @param \MastermindBundle\Entity\User $generatedByUserId
     *
     * @return Puzzle
     */
    public function setGeneratedByUserId(\MastermindBundle\Entity\User $generatedByUserId = null)
    {
        $this->generatedByUserId = $generatedByUserId;

        return $this;
    }

    /**
     * Get generatedByUserId
     *
     * @return \MastermindBundle\Entity\User
     */
    public function getGeneratedByUserId()
    {
        return $this->generatedByUserId;
    }
}
