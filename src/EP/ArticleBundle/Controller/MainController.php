<?php

namespace EP\ArticleBundle\Controller;

use EP\ArticleBundle\Model\ArticleQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EP\ArticleBundle\Model\Article as Article;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function addArticleAction(Request $request)
    {
        $article = new Article();
        $userId = $this->container->get('security.context')->getToken()->getUser();
        $article->setAuthorId($userId);

        $formBuilder = $this->createFormBuilder($article)
            ->add('title', 'text', array('required' => 'true'))
            ->add('img', 'url', array('required' => 'true'))
            ->add('header', 'text', array('required' => 'true'))
            ->add('content', 'textarea', array('required' => 'true'))
            ->add('Ysource', 'url', array('required' => 'false'))
            ->add('submit', 'submit');

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if($form->isValid())
        {
            $article->save();
            $request->getSession()->getFlashBag()->add('notice', 'Article publié!');
            //return $this->redirect($this->generateUrl(''), 301);
        }

        return $this->render('EPArticleBundle:Main:addArticle.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editArticleAction($id, Request $request)
    {
        $q = new ArticleQuery();
        $currentArticle = $q->findPK($id);

        $formBuilder = $this->createFormBuilder($currentArticle)
            ->add('title', 'text', array('required' => 'true'))
            ->add('img', 'url', array('required' => 'true'))
            ->add('header', 'text', array('required' => 'true'))
            ->add('content', 'textarea', array('required' => 'true'))
            ->add('Ysource', 'url', array('required' => 'false'))
            ->add('submit', 'submit');

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if($form->isValid())
        {
            $currentArticle->save();
            $request->getSession()->getFlashBag()->add('notice', 'Article modifé!');
            //return $this->redirect($this->generateUrl(''), 301);
        }

        return $this->render('EPArticleBundle:Main:editArticle.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteArticleAction($id)
    {
        $q = new ArticleQuery();
        $currentArticle = $q->findPK($id);

        $currentArticle->delete();
        $this->getSession()->getFlashBag()->add('notice', 'Article supprimé!');
        return $this->redirect($this->generateUrl('ep_add_article'), 301);
    }

    public function showArticleAction($id)
    {
        $q = new ArticleQuery();
        $currentArticle = $q->findPK($id);

        return $this->render('EPArticleBundle:Main:showArticle.html.twig', array(
            'article' => $currentArticle
        ));
    }

    public function showAllArticleAction()
    {
        $articles = ArticleQuery::create()
            ->find();
        return $this->render('EPArticleBundle:Main:showAllArticle.html.twig', array(
            'articles' => $articles
        ));
    }
}
