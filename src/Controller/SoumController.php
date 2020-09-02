<?php

namespace App\Controller;

use App\Entity\Soum;
use App\Form\SoumType;
use App\Repository\SoumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/soum")
 */
class SoumController extends AbstractController
{
    /**
     * @Route("/list", name="soumission-list", methods={"GET"})
     * @return JsonResponse
     */

    public function listproj()
    {



        $contact=$this->getDoctrine()->getRepository('App:Soum')->findAll();
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No Soummision found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }


    /**
     * @Route("/delete/{id}", name="soumission-delete", methods={"DELETE"})
     * @return JsonResponse
     */
    public function deleteproject($id)
    {

        $contact=$this->getDoctrine()->getRepository('App:Soum')->find($id);
        if (empty($contact)) {
            $response=array(
                'code'=>1,
                'message'=>'project Not found !',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $em=$this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'soummision deleted !',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }



    /**
     * @Route("/getbyid/{id}", name="soumission-one", methods={"GET"})
     * @return JsonResponse
     */

    public function getcontact($id)
    {
        $contact=$this->getDoctrine()->getRepository('App:Soum')->find($id);
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No soumission found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }

}
