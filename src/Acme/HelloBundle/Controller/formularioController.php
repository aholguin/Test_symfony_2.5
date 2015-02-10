<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HelloBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;

class formularioController extends Controller {

    public function indexAction(Request $request) {
        $categoria = new Category();
        //$categoria->setName('carros');

        $form = $this->createFormBuilder($categoria)
                ->add('name', 'text')
                ->add('Guardar', 'submit')
                ->add('guardarYAgregar', 'submit')
                ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            // guardar la tarea en la base de datos
            echo '<pre>';
            print_r($categoria);
            if ($form->get('guardarYAgregar')->isClicked())
                die('nuevo');
            else
                die('fin');
            return $this->redirect($this->generateUrl('task_success'));
        }

        return $this->render('AcmeHelloBundle:formularios:index.html.twig', array('form' => $form->createView()));
    }

}
