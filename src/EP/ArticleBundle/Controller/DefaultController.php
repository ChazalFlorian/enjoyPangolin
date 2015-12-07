<?php

namespace EP\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EPArticleBundle:Default:index.html.twig');
    }
}
