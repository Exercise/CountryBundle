<?php

namespace Bundle\ExerciseCom\CountryBundle\Controller;

use Bundle\ExerciseCom\CommonBundle\Controller\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BackendController extends BaseController
{
    public function indexAction()
    {
        return $this->get('templating')->renderResponse('CountryBundle:Backend:index.html.twig');
    }

    public function newAction()
    {
        return $this->get('templating')->renderResponse('CountryBundle:Backend:new.html.twig');
    }

    public function createAction()
    {
        return $this->get('templating')->renderResponse('CountryBundle:Backend:create.html.twig');
    }

    public function editAction($identifier)
    {
        // fetch $object from database

        if(!$object) {
            throw new NotFoundHttpException();
        }

        return $this->get('templating')->renderResponse('CountryBundle:Backend:edit.html.twig', array('object' => $object));
    }

    public function updateAction($identifier)
    {
        //return new RedirectResponse();
    }

    public function deleteAction($identifier)
    {
        // fetch $object from database

        if(!$object) {
            throw new NotFoundHttpException();
        }

        //return new RedirectResponse();
    }
}
