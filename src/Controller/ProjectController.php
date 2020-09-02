<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/project")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/list", name="project-list", methods={"GET"})
     * @return JsonResponse
     */

    public function listproj()
    {



        $contact=$this->getDoctrine()->getRepository('App:Project')->findAll();
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No project found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }


    /**
     * @Route("/delete/{id}", name="project-delete", methods={"DELETE"})
     * @return JsonResponse
     */
    public function deleteproject($id)
    {

        $contact=$this->getDoctrine()->getRepository('App:Project')->find($id);
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
            'message'=>'project deleted !',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }


    /**
     * @Route("/getbyid/{id}", name="project-one", methods={"GET"})
     * @return JsonResponse
     */

    public function getcontact($id)
    {
        $contact=$this->getDoctrine()->getRepository('App:Project')->find($id);
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No project found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }


    /**
     * @Route("/update/{id}", name="project-update", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function updateproject(Request $request,$id)
    {
        $post = $this->getDoctrine()->getRepository('App:Project')->find($id);
        if (empty($post)) {
            $response = array(
                'code' => 1,
                'message' => 'project Not found !',
                'errors' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $body = $request->getContent();
        $data = $this->get('serializer')->deserialize($body, 'App\Entity\Project', 'json');




        if (!is_null($data->getAdresse())) {
            $post->setAdresse($data->getAdresse());
        }



        $em=$this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'contact updated!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }

}
