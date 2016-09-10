<?php

namespace MastermindBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MastermindBundle:Default:index.html.twig');
    }
}
