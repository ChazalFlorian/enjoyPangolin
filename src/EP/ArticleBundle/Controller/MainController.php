<?php

namespace EP\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function addArticleAction()
    {

        return $this->render('EPArticleBundle:Default:index.html.twig');
    }
}
