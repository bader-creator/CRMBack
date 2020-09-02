<?php

namespace App\Controller;

use App\Entity\Opportunity;
use App\Form\OpportunityType;
use App\Repository\OpportunityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/opportunity")
 */
class OpportunityController extends AbstractController
{



    /**
     * @Route("/add", name="opp-addnew-opp", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function addopportunity(Request $request)
    {



        $data=$request->getContent();



        $opportunity=$this->container->get('serializer')->deserialize($data ,'App\Entity\Opportunity','json');
        $em=$this->getDoctrine()->getManager();
        $em->persist($opportunity);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'opportunity created!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,Response::HTTP_CREATED);
    }



    /**
     * @Route("/list", name="opp-list", methods={"GET"})
     * @return JsonResponse
     */

    public function listcontact()
    {



        $contact=$this->getDoctrine()->getRepository('App:Opportunity')->findBy(['archive' => 'simple']);
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No Opportunity found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }




    /**
     * @Route("/delete/{id}", name="opp-delete", methods={"DELETE"})
     * @return JsonResponse
     */
    public function deleteopp($id)
    {

        $opp=$this->getDoctrine()->getRepository('App:Opportunity')->find($id);
        if (empty($opp)) {
            $response=array(
                'code'=>1,
                'message'=>'opp Not found !',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $em=$this->getDoctrine()->getManager();
        $em->remove($opp);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'opp deleted !',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }



    /**
     * @Route("/update/{id}", name="opp-update", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function updateopp(Request $request,$id)
    {
        $opp = $this->getDoctrine()->getRepository('App:Opportunity')->find($id);
        if (empty($opp)) {
            $response = array(
                'code' => 1,
                'message' => 'opp Not found !',
                'errors' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $body = $request->getContent();
        $data = $this->get('serializer')->deserialize($body, 'App\Entity\Opportunity', 'json');



        if (!is_null($data->getcprospect())) {
            $opp->setcprospect($data->getcprospect());
        }

        if (!is_null($data->getnomaffaire())) {
            $opp->setnomaffaire($data->getnomaffaire());
        }

        if (!is_null($data->getsource())) {
            $opp->setsource($data->getsource());
        }

        if (!is_null($data->getdateecheance())) {
            $opp->setdateecheance($data->getdateecheance());
        }

        if (!is_null($data->getmontant())) {
            $opp->setmontant($data->getmontant());
        }


        if (!is_null($data->getdevise())) {
            $opp->setdevise($data->getdevise());
        }

        if (!is_null($data->getetape())) {
            $opp->setetape($data->getetape());
        }

        if (!is_null($data->getproba())) {
            $opp->setproba($data->getproba());
        }

        if (!is_null($data->getComments())) {
            $opp->setComments($data->getComments());
        }

        if (!is_null($data->getnotes())) {
            $opp->setnotes($data->getnotes());
        }

        if (!is_null($data->getbrief())) {
            $opp->setbrief($data->getbrief());
        }

        if (!is_null($data->getsociete())) {
            $opp->setsociete($data->getsociete());
        }
        if (!is_null($data->getidref())) {
            $opp->setidref($data->getidref());
        }
        if (!is_null($data->getarchive())) {
            $opp->setarchive($data->getarchive());
        }


        $em=$this->getDoctrine()->getManager();
        $em->persist($opp);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'opp updated!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }


    /**
     * @Route("/getoppbystep/{step}", name="opp-getbystep", methods={"GET"})
     * @param $id
     * @return JsonResponse
     */
    public function getbystep($step)
    {

        $contact=$this->getDoctrine()->getRepository('App:Opportunity')->findBy(['etape' => $step , 'archive' => 'simple']) ;
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No opp found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }



    /**
     * @Route("/archive", name="opp-archive", methods={"GET"})
     * @param $id
     * @return JsonResponse
     */
    public function opparchive()
    {

        $contact=$this->getDoctrine()->getRepository('App:Opportunity')->findBy(['archive' => 'archive']) ;
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No opp found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }



    /**
     * @Route("/getoppbyid/{id}", name="opp-one-id", methods={"GET"})
     * @return JsonResponse
     */

    public function getoppbyid($id)
    {
        $contact=$this->getDoctrine()->getRepository('App:Opportunity')->find($id);
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No Opportunity found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }



    /**
     * @Route("/archiver/{id}", name="opp-archive-update", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function archiver(Request $request,$id)
    {
        $opp = $this->getDoctrine()->getRepository('App:Opportunity')->find($id);
        if (empty($opp)) {
            $response = array(
                'code' => 1,
                'message' => 'opp Not found !',
                'errors' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $body = $request->getContent();
        $data = $this->get('serializer')->deserialize($body, 'App\Entity\Opportunity', 'json');



        if (!is_null($data->getarchive())) {
            $opp->setarchive('archive');
        }

        $em=$this->getDoctrine()->getManager();
        $em->persist($opp);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'opp updated!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }




    /**
     * @Route("/countopp", name="opp-count", methods={"GET"})
     * @return Response
     */
    public function count(){

        $contact=$this->getDoctrine()->getRepository('App:Opportunity')->createQueryBuilder('u')
            ->select('count(u.id)')->where('u.archive = :simple')->setParameter('simple', 'simple')
            ->getQuery()
            ->getSingleScalarResult();;


        return new Response($contact) ;

    }




}
