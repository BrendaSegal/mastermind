<?php
namespace MastermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="saved_puzzle_progress")
 */
class SavedPuzzleProgress
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Turn", mappedBy="savedPuzzleProgress")
     */
    private $turns;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->turns = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return SavedPuzzleProgress
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return SavedPuzzleProgress
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \MastermindBundle\Entity\User $user
     *
     * @return SavedPuzzleProgress
     */
    public function setUser(\MastermindBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \MastermindBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add turn
     *
     * @param \MastermindBundle\Entity\Turn $turn
     *
     * @return SavedPuzzleProgress
     */
    public function addTurn(\MastermindBundle\Entity\Turn $turn)
    {
        $this->turns[] = $turn;

        return $this;
    }

    /**
     * Remove turn
     *
     * @param \MastermindBundle\Entity\Turn $turn
     */
    public function removeTurn(\MastermindBundle\Entity\Turn $turn)
    {
        $this->turns->removeElement($turn);
    }

    /**
     * Get turns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTurns()
    {
        return $this->turns;
    }
}
