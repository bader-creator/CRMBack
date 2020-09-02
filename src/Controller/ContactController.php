<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * @Route("/api/contact")
 */
class ContactController extends AbstractController
{







    /**
     * @Route("/updatecontact/{id}", name="contact-update", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function updatecontact(Request $request,$id)
    {
        $post = $this->getDoctrine()->getRepository('App:Contact')->find($id);
        if (empty($post)) {
            $response = array(
                'code' => 1,
                'message' => 'contact Not found !',
                'errors' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $body = $request->getContent();
        $data = $this->get('serializer')->deserialize($body, 'App\Entity\Contact', 'json');

        $post->setFullname($data->getfullname());
        $post->setNatureDeContact($data->getNatureDeContact());


        if (!is_null($data->getadresse())) {
            $post->setAdresse($data->getadresse());
        }
        if (!is_null($data->getCadreDeRencontre())){
            $post->setCadreDeRencontre($data->getCadreDeRencontre());
        }
        if (!is_null($data->getcommentaire())) {
            $post->setCommentaire($data->getcommentaire());
        }
        if (!is_null($data->getDatedenaissance())) {
            $post->setDateDeNaissance($data->getDatedenaissance());
        }
        if (!is_null($data->getfonction())) {
            $post->setFonction($data->getfonction());
        }
        if (!is_null($data->getorganisme())) {
            $post->setOrganisme($data->getorganisme());
        }
        if (!is_null($data->getpays())) {
            $post->setPays($data->getpays());
        }
        if (!is_null($data->gettel())) {
            $post->setTel($data->gettel());
        }




        if (!is_null($data->getFacebook())) {
            $post->setFacebook($data->getFacebook());
        }
        if (!is_null($data->getTwitter())) {
            $post->setTwitter($data->getTwitter());
        }
        if (!is_null($data->getLinkedin())) {
            $post->setLinkedin($data->getLinkedin());
        }
        if (!is_null($data->getViadio())) {
            $post->setViadio($data->getViadio());
        }




        if (!is_null($data->gettel1())) {
            $post->setTel1($data->gettel1());
        }

        if (!is_null($data->gettel2())) {
            $post->setTel2($data->gettel2());
        }


        if (!is_null($data->getmail())) {
            $post->setMail($data->getmail());
        }

        if (!is_null($data->getmail2())) {
            $post->setMail2($data->getmail2());
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


    /**
     * @Route("/addcontact", name="contact-addnew", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function addcontact(Request $request)
    {



        $data=$request->getContent();



        $contact=$this->container->get('serializer')->deserialize($data ,'App\Entity\Contact','json');
        $em=$this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
        $response=array(
            'code'=>0,
            'message'=>'contact created!',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,Response::HTTP_CREATED);
    }


    /**
     * @Route("/list", name="contact-list", methods={"GET"})
     * @return JsonResponse
     */

    public function listcontact()
    {



        $contact=$this->getDoctrine()->getRepository('App:Contact')->findAll(array(),array('id'=>'DESC'));
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No contact found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }



    /**
     * @Route("/getprospect", name="contact-list-pro", methods={"GET"})
     * @return JsonResponse
     */

    public function getprospect()
    {



        $prospect=$this->getDoctrine()->getRepository('App:Contact')->findBy(['nature_de_contact' => 'prospect']) ;


        if (empty($prospect)){
            $response=array(
                'code'=>1,
                'message'=>'No prospect found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($prospect, 'json');
        return new JsonResponse(json_decode($data),200);
    }

    /**
     * @Route("/getcontact/{id}", name="contact-one", methods={"GET"})
     * @return JsonResponse
     */

    public function getcontact($id)
    {
        $contact=$this->getDoctrine()->getRepository('App:Contact')->find($id);
        if (empty($contact)){
            $response=array(
                'code'=>1,
                'message'=>'No contact found!',
                'errors'=>null,
                'result'=>null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
        $data = $this->container->get('serializer')->serialize($contact, 'json');
        return new JsonResponse(json_decode($data),200);
    }



    /**
     * @Route("/countcontact", name="contact-count", methods={"GET"})
     * @return Response
     */
    public function count(){

        $contact=$this->getDoctrine()->getRepository('App:Contact')->createQueryBuilder('u')
            ->select('count(u.id)')
            ->getQuery()
            ->getSingleScalarResult();;


        return new Response($contact) ;

    }





    /**
     * @Route("/deletecontact/{id}", name="contact-delete", methods={"DELETE"})
     * @return JsonResponse
     */
    public function deletecontact($id)
    {

        $contact=$this->getDoctrine()->getRepository('App:Contact')->find($id);
        if (empty($contact)) {
            $response=array(
                'code'=>1,
                'message'=>'contact Not found !',
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
            'message'=>'contact deleted !',
            'errors'=>null,
            'result'=>null
        );
        return new JsonResponse($response,200);
    }























































    /**
     * @Route("/{id}", name="contact_show", methods={"GET"})
     */
    public function show(Contact $contact): Response
    {
        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contact_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contact $contact): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contact_index');
        }

        return $this->render('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contact_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contact_index');
    }
}
