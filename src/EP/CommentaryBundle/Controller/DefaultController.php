<?php

namespace EP\CommentaryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EPCommentaryBundle:Default:index.html.twig');
    }
}
