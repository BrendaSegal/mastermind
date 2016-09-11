<?php
namespace MastermindBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $puzzlesPlayed;

    /**
     * @ORM\Column(type="integer")
     */
    private $puzzlesWon;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set puzzlesPlayed
     *
     * @param integer $puzzlesPlayed
     *
     * @return User
     */
    public function setPuzzlesPlayed($puzzlesPlayed)
    {
        $this->puzzlesPlayed = $puzzlesPlayed;

        return $this;
    }

    /**
     * Get puzzlesPlayed
     *
     * @return integer
     */
    public function getPuzzlesPlayed()
    {
        return $this->puzzlesPlayed;
    }

    /**
     * Set puzzlesWon
     *
     * @param integer $puzzlesWon
     *
     * @return User
     */
    public function setPuzzlesWon($puzzlesWon)
    {
        $this->puzzlesWon = $puzzlesWon;

        return $this;
    }

    /**
     * Get puzzlesWon
     *
     * @return integer
     */
    public function getPuzzlesWon()
    {
        return $this->puzzlesWon;
    }
}
