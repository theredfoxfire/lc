<?php

namespace Lc\LcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LcLcBundle:Default:index.html.twig');
    }
}
