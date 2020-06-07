<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin")
 */
class UserController extends AbstractController
{
   
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    

    /**
     * @Route("/add", name="admin_add", methods={"GET","POST"})
     */
    public function add(Request $request)
    {
    
        $agent = new User();
      
        $data = $request->request->all();
      
   
 
  //$agent->setPassword($data['password']);
  $agent->setPassword($this->passwordEncoder->encodePassword(
               $agent,
               $data['password']
           ));
  $agent->setEmail($data['email']);
  $agent->setRoles($data['role']);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($agent);
        $entityManager->flush();
                
      
        return $this->redirectToRoute('admin_index');
    }
   

    /**
     * @Route("/{id}/edit", name="admin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $admin): Response
    {
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/edit.html.twig', [
            'admin' => $admin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $admin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$admin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($admin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

     /**
     * @Route("/login", name="login", methods={"GET", "POST"})
     */
    public function login()
    {
        return $this->render('eshop/admin/login.html.twig');
    }


}
