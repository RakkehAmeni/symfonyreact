<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\UserTypeFormType;
use App\Repository\UserRepository;
use App\Entity\User;


class UserController extends AbstractController
{  
    /***
     * @Route("/", name="userindex", methods={"GET"}))
     */
  /* public function index(UserRepository $userRepository): Response
    {
        $user = $userRepository->findAll();
        $serializer = SerializerBuilder::create()->build();
        $reponse = $serializer->serialize($user, 'json');
        $reponse = json_decode($reponse);
        return new JsonResponse($reponse);
    }
*/
/**
     * @Route("/", name ="adduser", methods={"POST","GET"}))
     */
    public function addUser(Request $request) :Response
    {
      /*  $user = new User();
        $form =$this->createForm(UserTypeFormType::class,$user);
       
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('userindex');
        }*/
        $user = new User();
        $form =$this->createForm(UserTypeFormType::class,$user);
       
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('displayusers');
        }
        return $this->render("user/adduser.html.twig", [
            'user' => $user,
            'form' => $form->createView(),]);
        
    }       
    
   /***
     * @Route("/displayusers/{id}", name="displayusers", methods={"GET"})
     
    public function Display(User $user): Response
    {
/*        $serializer = SerializerBuilder::create()->build();
        $reponse = $serializer->serialize($user, 'json');
        $reponse = json_decode($reponse);
        return new JsonResponse($reponse);
         
    }*/
    /**
 * @Route("/displayusers", name="displayusers")
 */
public function displayusers()
{
    $users = $this->getDoctrine()->getRepository(User::class)->findAll();

    return $this->render('user/displayusers.html.twig', [
        "users" => $users,
    ]);
}      
 /**
 *@Route("/updateuser/{id}", name="updateuser")
 */
public function Update (Request $request, int $id):Response
{
    $entityManager = $this->getDoctrine()->getManager();

    $user = $entityManager->getRepository(User::class)->find($id);
    $form = $this->createForm(UserTypeFormType::class, $user);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $entityManager->flush();
        $this->addFlash(
            'notice', 'User added successfully');
        

    }
    return $this->render("user/update.html.twig", [
        "form" => $form->createView(),
        'user' => $user,
    ]);
}

/**
 * @Route("/deleteuser/{id}", name="deleteuser")
 */

public function delete(int $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $user = $entityManager->getRepository(User::class)->find($id);
    $entityManager->remove($user);
    $entityManager->flush();

    return $this->redirectToRoute("displayusers");
}

   
}



