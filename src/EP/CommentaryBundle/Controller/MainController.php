<?php

namespace EP\CommentaryBundle\Controller;

use EP\CommentaryBundle\Model\CommentaryQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EP\CommentaryBundle\Model\Commentary as Commentary;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function addCommentaryAction(Request $request)
    {
        $commentary = new Commentary();
        $userId = $this->container->get('security.context')->getToken()->getUser();
        $commentary->setAuthorId($userId);
        $commentary->setLike(0);
        $commentary->setDislike(0);
        $commentary->setArticle();

        $formBuilder = $this->createFormBuilder($commentary)
            ->add('content', 'textarea', array('required' => 'true'));

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if($form->isValid()){
            $commentary->save();
            $request->getSession()->getFlashBag()->add('notice', 'Commentaire publié!');
            //return $this->redirect($this->generateUrl(''), 301);
        }

        return $this->render('EPCommentaryBundle:Main:addCommentary.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function editCommentaryAction($id, Request $request)
    {
        $q = new CommentaryQuery();
        $currentCommentary = $q->findPk($id);

        $formBuilder = $this->createFormBuilder($currentCommentary)
            ->add('content', 'textarea', array('required' => 'true'));

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if($form->isValid()){
            $currentCommentary->save();
            $request->getSession()->getFlashBag()->add('notice', 'Commentaire modifié!');
            //return $this->redirect($this->generateUrl(''), 301);
        }

        return $this->render('EPCommentaryBundle:Main:editCommentary.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteCommentaryAction($id)
    {
        $q = new CommentaryQuery();
        $currentCommentary = $q->findPk($id);

        $currentCommentary->delete($id);
        $this->getSession()->getFlashBag()->add('notice', 'Commentaire supprimé!');
        return $this->redirect($this->generateUrl('ep_add_commentary'), 301);
    }

    public function showCommentaryByUserAction($userId)
    {
        $q = new CommentaryQuery();
        $currentCommentary = $q->findByAuthorId($userId);

        return $this->render('EPCommentaryBundle:Main:showCommentaryByUser.html.twig', array(
            'commentaries' => $currentCommentary
        ));
    }

    public function showCommentaryByArticleAction($articleId)
    {
        $q = new CommentaryQuery();
        $currentCommentary = $q->findByArticleId($articleId);

        return $this->render('EPCommentaryBundle:Main:showCommentaryByArticle.html.twig', array(
            'commentaries' => $currentCommentary
        ));
    }
}
