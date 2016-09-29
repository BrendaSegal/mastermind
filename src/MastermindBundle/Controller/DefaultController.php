<?php

namespace MastermindBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $puzzleManager = $this->get('mastermind.puzzle.manager');
        $puzzle = $puzzleManager->createNewPuzzle(6, 8);

        return $this->render('MastermindBundle:Default:index.html.twig',
            array(
                'puzzle' => $puzzle
            )
        );
    }
}
