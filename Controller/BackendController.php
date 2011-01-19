<?php

namespace Bundle\ExerciseCom\CountryBundle\Controller;

use Bundle\ExerciseCom\CommonBundle\Controller\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BackendController extends BaseController
{
    public function indexAction()
    {
        return $this->render('CountryBundle:Backend:index.twig.html');
    }

    public function newAction()
    {
        return $this->render('CountryBundle:Backend:new.twig.html');
    }

    public function createAction()
    {
        return $this->render('CountryBundle:Backend:create.twig.html');
    }

    public function editAction($identifier)
    {
        // fetch $object from database

        if(!$object) {
            throw new NotFoundHttpException();
        }

        return $this->render('CountryBundle:Backend:edit.twig.html', array('object' => $object));
    }

    public function updateAction($identifier)
    {
        //return $this->redirect();
    }

    public function deleteAction($identifier)
    {
        // fetch $object from database

        if(!$object) {
            throw new NotFoundHttpException();
        }

        //return $this->redirect();
    }
}
