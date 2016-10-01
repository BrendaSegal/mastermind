<?php
namespace MastermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="puzzle", uniqueConstraints={@ORM\UniqueConstraint(name="puzzle_code_idx", columns={"puzzle_code"})})
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
     * @ORM\Column(type="string", length=20)
     */
    private $puzzleCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfColors;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfSlots;

    /**
      * @ORM\OneToMany(targetEntity="MastermindCodeSlot", mappedBy="puzzle")
      */
    private $mastermindCodeSlots;

    /**
     * @ORM\ManyToMany(targetEntity="Color")
     * @ORM\JoinTable(name="puzzle_colors",
     *      joinColumns={@ORM\JoinColumn(name="puzzle_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="color_id", referencedColumnName="id")}
     *      )
     */
    private $availableColors;

    /**
      * @ORM\ManyToOne(targetEntity="User")
      * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
      */
    private $generatedBy;

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
        $this->mastermindCodeSlots = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set puzzleCode
     *
     * @param string $puzzleCode
     *
     * @return Puzzle
     */
    public function setPuzzleCode($puzzleCode)
    {
        $this->puzzleCode = $puzzleCode;

        return $this;
    }

    /**
     * Get puzzleCode
     *
     * @return string
     */
    public function getPuzzleCode()
    {
        return $this->puzzleCode;
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Puzzle
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
     * Add mastermindCodeSlot
     *
     * @param \MastermindBundle\Entity\MastermindCodeSlot $mastermindCodeSlot
     *
     * @return Puzzle
     */
    public function addMastermindCodeSlot(\MastermindBundle\Entity\MastermindCodeSlot $mastermindCodeSlot)
    {
        $this->mastermindCodeSlots[] = $mastermindCodeSlot;

        return $this;
    }

    /**
     * Remove mastermindCodeSlot
     *
     * @param \MastermindBundle\Entity\MastermindCodeSlot $mastermindCodeSlot
     */
    public function removeMastermindCodeSlot(\MastermindBundle\Entity\MastermindCodeSlot $mastermindCodeSlot)
    {
        $this->mastermindCodeSlots->removeElement($mastermindCodeSlot);
    }

    /**
     * Get mastermindCodeSlots
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMastermindCodeSlots()
    {
        return $this->mastermindCodeSlots;
    }

    /**
     * Set generatedBy
     *
     * @param \MastermindBundle\Entity\User $generatedBy
     *
     * @return Puzzle
     */
    public function setGeneratedBy(\MastermindBundle\Entity\User $generatedBy = null)
    {
        $this->generatedBy = $generatedBy;

        return $this;
    }

    /**
     * Get generatedBy
     *
     * @return \MastermindBundle\Entity\User
     */
    public function getGeneratedBy()
    {
        return $this->generatedBy;
    }

    /**
     * Add availableColor
     *
     * @param \MastermindBundle\Entity\Color $availableColor
     *
     * @return Puzzle
     */
    public function addAvailableColor(\MastermindBundle\Entity\Color $availableColor)
    {
        $this->availableColors[] = $availableColor;

        return $this;
    }

    /**
     * Remove availableColor
     *
     * @param \MastermindBundle\Entity\Color $availableColor
     */
    public function removeAvailableColor(\MastermindBundle\Entity\Color $availableColor)
    {
        $this->availableColors->removeElement($availableColor);
    }

    /**
     * Get availableColors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAvailableColors()
    {
        return $this->availableColors;
    }

    /**
     * Set numberOfColors
     *
     * @param integer $numberOfColors
     *
     * @return Puzzle
     */
    public function setNumberOfColors($numberOfColors)
    {
        $this->numberOfColors = $numberOfColors;

        return $this;
    }

    /**
     * Get numberOfColors
     *
     * @return integer
     */
    public function getNumberOfColors()
    {
        return $this->numberOfColors;
    }

    /**
     * Set numberOfSlots
     *
     * @param integer $numberOfSlots
     *
     * @return Puzzle
     */
    public function setNumberOfSlots($numberOfSlots)
    {
        $this->numberOfSlots = $numberOfSlots;

        return $this;
    }

    /**
     * Get numberOfSlots
     *
     * @return integer
     */
    public function getNumberOfSlots()
    {
        return $this->numberOfSlots;
    }
}
