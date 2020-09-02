<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="auth")
     * @param Request $request
     * @return JsonResponse
     */
    final public function index(Request $request): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuthController.php',
        ]);
    }

    /**
     * Simple user registration action
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    final public function register(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $data=$request->getContent();



        $usero=$this->container->get('serializer')->deserialize($data ,'App\Entity\User','json');

         $key = $usero->getUsername() ;

        $contact=$this->getDoctrine()->getRepository('App:User')->findBy(['username' => $key]) ;

        if (empty($contact)){


            $user = new User();
            $user->setUsername($usero->getUsername());
            $user->setEmail($usero->getEmail());
            $pass = $encoder->encodePassword($usero, $usero->getPassword());
            $user->setPassword($pass);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new Response(sprintf('User %s successfully created', $user->getUsername()));
        }
   else {

       $response=[
           'code'=>1,
           'message'=>'user exists',
           'errors'=>null,
           'result'=>null
       ];
       return new JsonResponse($response);


   }
    }

    /**
     * A protected resource ACL IS_AUTHENTICATED_FULLY
     *  to test the Token JWT
     * @return Response
     */
    final public function api(): Response
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }

}
