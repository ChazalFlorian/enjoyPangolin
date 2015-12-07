<?php

namespace EP\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EPUserBundle:Default:index.html.twig');
    }
}
