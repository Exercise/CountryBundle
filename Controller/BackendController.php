<?php

namespace Exercise\CountryBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class BackendController extends BaseController
{
    public function indexAction()
    {
        return $this->get('templating')->renderResponse('ExerciseCountryBundle:Backend:index.html.twig');
    }

    public function newAction()
    {
        return $this->get('templating')->renderResponse('ExerciseCountryBundle:Backend:new.html.twig');
    }

    public function createAction()
    {
        return $this->get('templating')->renderResponse('ExerciseCountryBundle:Backend:create.html.twig');
    }

    public function editAction($id)
    {
         // fetch $object from database
        $object = null;

        if(!$object) {
            throw new NotFoundHttpException();
        }

        return $this->get('templating')->renderResponse('ExerciseCountryBundle:Backend:edit.html.twig', array(
            'object' => $object,
        ));
    }

    public function updateAction($id)
    {
        //return new RedirectResponse();
    }

    public function deleteAction($identifier)
    {
        // fetch $object from database
        $object = null;

        if(!$object) {
            throw new NotFoundHttpException();
        }

        //return new RedirectResponse();
    }
}
