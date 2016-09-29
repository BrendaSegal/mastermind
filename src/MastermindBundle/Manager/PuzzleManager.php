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

        $masterCodePattern = $this->generateMasterCodePattern($puzzle, $numberOfSlots, $numberOfColors);

        foreach ($masterCodePattern as $mc) {
            $puzzle->addMastermindCodeSlot($mc);
        }

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

    private function generateMasterCodePattern($puzzle, $numberOfSlots, $numberOfColors)
    {
        $slotsToFill = array();

        $colorsArray = $this->entityManager->getRepository('MastermindBundle:Color')
            ->findAll();

        if ($numberOfColors > count($colorsArray)) {
            //throw an exception
        }

        shuffle($colorsArray);

        $colorsArraySliced = array_slice($colorsArray, 0, $numberOfColors);

        for ($i=0; $i<$numberOfSlots; $i++) {
            $randomIndex = rand(0, count($colorsArraySliced)-1);

            $color = $colorsArraySliced[$randomIndex];

            $masterCode = new MastermindCodeSlot();
            $masterCode->setColor($color);
            $masterCode->setPuzzle($puzzle);

            array_push($slotsToFill, $masterCode);
        }        

        return $slotsToFill;
    }

    public function loadExistingPuzzleById()
    {

    }

    public function loadPuzzleByCode()
    {

    }

}