<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/formation")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/listformation", name="formation-list", methods={"GET"})
     */
        public function listformation(){
            $formation=$this->getDoctrine()->getRepository('App:Formation')->findAll();
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
     * @Route("/getformation/{id}", name="formation-one", methods={"GET"})
     * @return JsonResponse
     */

    public function getformation($id)
    {
        $formation=$this->getDoctrine()->getRepository('App:Formation')->find($id);
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
     * @Route("/deleteformation/{id}", name="formation-delete", methods={"DELETE"})
     * @return JsonResponse
     */
    public function deleteformation($id)
    {
        $formation=$this->getDoctrine()->getRepository('App:Formation')->find($id);
        if (empty($formation)) {
            $response=array(
                'code'=>1,
                'message'=>'formation Not found !',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $em=$this->getDoctrine()->getManager();
        $em->remove($formation);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'formation deleted !',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }






    /**
     * @Route("/addformation", name="formation-add", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function addformation(Request $request)
    {
        $data=$request->getContent();



        $formation=$this->container->get('serializer')->deserialize($data ,'App\Entity\Formation','json');
        $em=$this->getDoctrine()->getManager();
        $em->persist($formation);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'formation created!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,Response::HTTP_CREATED);
    }








    /**
     * @Route("/updateformation/{id}", name="formation-update", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function updateformation(Request $request,$id)
    {
        $formation=$this->getDoctrine()->getRepository('App:Formation')->find($id);
        if (empty($formation))
        {
            $response=array(
                'code'=>1,
                'message'=>'formation Not found !',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $body=$request->getContent();
        $data=$this->get('serializer')->deserialize($body,'App\Entity\Formation','json');



        $formation->setTitre($data->getTitre());

        if(!is_null($data->getreview())){
        $formation->setReview($data->getreview()); }

        if(!is_null($data->getformateur())){
            $formation->setFormateur($data->getformateur()); }

        if(!is_null($data->getlieuformation())){
            $formation->setLieuFormation($data->getlieuformation()); }

        if(!is_null($data->getDateBeginFormation())){
            $formation->setDateBeginFormation($data->getDateBeginFormation(7 , 30)); }

        if(!is_null($data->getDateEndFormation())){
            $formation->setDateEndFormation($data->getDateEndFormation(7 , 30)); }

        if(!is_null($data->getdateformation())){
            $formation->setDateFormation($data->getdateformation()); }




        $em=$this->getDoctrine()->getManager();
        $em->persist($formation);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'formation updated!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }





    /**
     * @Route("/getformation/{id}", name="formation-one", methods={"GET"})
     * @return JsonResponse
     */

    public function getformationbyid($id)
    {
        $contact=$this->getDoctrine()->getRepository('App:Formation')->find($id);
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No formation found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }




    /**
     * @Route("/countformation", name="formation-count", methods={"GET"})
     * @return JsonResponse
     */


       public function count(){

           $contact=$this->getDoctrine()->getRepository('App:Formation')->createQueryBuilder('u')
               ->select('count(u.id)')
               ->getQuery()
               ->getSingleScalarResult();;


             return new Response($contact) ;

       }





}




























