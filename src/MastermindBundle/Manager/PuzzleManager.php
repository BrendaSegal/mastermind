<?php
namespace MastermindBundle\Manager;

use Doctrine\ORM\EntityManager;
use MastermindBundle\Entity\Puzzle;
use MastermindBundle\Entity\MastermindCodeSlot;

class PuzzleManager
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createNewPuzzle($numberOfSlots, $numberOfColors)
    {
        $puzzleCode = $this->generatePuzzleCode();

        if (!$puzzleCode) {
            //throw exception
        }

        $puzzle = new Puzzle();
        $this->generateAvailableColors($puzzle, $numberOfColors);
        $this->generateMasterCodePattern($puzzle, $numberOfSlots);

        $puzzle->setNumberOfColors($numberOfColors);
        $puzzle->setNumberOfSlots($numberOfSlots);
        $puzzle->setCreatedAt(new \DateTime("now"));
        $puzzle->setUpdatedAt(new \DateTime("now"));
        $puzzle->setPuzzleCode($puzzleCode);

        return $puzzle;
    }

    private function generatePuzzleCode($codeLength = 20)
    {
        $maxAttempts = 20;
        while ($maxAttempts >= 20) {
            $code = bin2hex(openssl_random_pseudo_bytes($codeLength/2));
            $existingPuzzle = $this->retrievePuzzleWithCode($code);

            if (is_null($existingPuzzle)) {
                return $code;
            }

            $maxAttempts--;
        }
        
        return false;
    }

    public function retrievePuzzleWithCode($code)
    {
        $em = $this->entityManager;

        $puzzles = $em->getRepository('MastermindBundle:Puzzle')
            ->findBy(array('puzzleCode' => $code));

        if (empty ($puzzles)) {
            return null;
        }

        return $puzzle[0];
    }

    private function generateAvailableColors($puzzle, $numberOfColors)
    {
        $colorsArray = $this->entityManager->getRepository('MastermindBundle:Color')
            ->findAll();

        if ($numberOfColors > count($colorsArray)) {
            //throw an exception
        }

        shuffle($colorsArray);

        $colorsArraySliced = array_slice($colorsArray, 0, $numberOfColors);

        foreach ($colorsArraySliced as $color)
        {
            $puzzle->addAvailableColor($color);
        }
    }

    private function generateMasterCodePattern($puzzle, $numberOfSlots)
    {
        $slotsToFill = array();

        $availableColors = $puzzle->getAvailableColors();

        for ($i=0; $i<$numberOfSlots; $i++) {
            $randomIndex = rand(0, count($availableColors)-1);

            $color = $availableColors[$randomIndex];

            $masterCode = new MastermindCodeSlot();
            $masterCode->setColor($color);
            $masterCode->setPuzzle($puzzle);

            $puzzle->addMastermindCodeSlot($masterCode);
        }
    }

    public function loadExistingPuzzleById()
    {

    }

    public function loadPuzzleByCode()
    {

    }

}