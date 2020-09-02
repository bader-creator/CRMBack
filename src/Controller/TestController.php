<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\TestType;
use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\SerializerInterface;

/**
 * @Route("/test")
 */
class TestController extends AbstractController
{

    /**
     * @Route("/list", name="test-list", methods={"GET"})
     */
    public function listformation(){
        $formation=$this->getDoctrine()->getRepository('App:Test')->findAll();
        if (empty($formation)){
            $response=array(
                'code'=>1,
                'message'=>'No formation found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($formation, 'json');
        return new JsonResponse(json_decode($data),200);
    }



    /**
     * @Route("/addtest", name="contact-add", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function addcontact(Request $request)
    {



        $data=$request->getContent();



        $contact=$this->container->get('serializer')->deserialize($data ,'App\Entity\Test','json');
        $em=$this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'test created!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,Response::HTTP_CREATED);
    }

}
