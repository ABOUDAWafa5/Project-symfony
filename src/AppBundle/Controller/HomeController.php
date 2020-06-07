<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/eshop/admin/home")
 */
class HomeController extends Controller
{
   /**
    * @Route("/", name="admin_home_index")
    */
    public function liste()
    {

return $this->render('eshop/admin/home/index.html.twig');
    }


   

}