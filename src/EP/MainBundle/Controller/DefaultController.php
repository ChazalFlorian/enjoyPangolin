<?php

namespace EP\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EPMainBundle:Default:index.html.twig');
    }
}
