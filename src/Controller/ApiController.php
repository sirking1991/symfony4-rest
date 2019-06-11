<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\User;

/**
 * @Route("/api")
 * 
 * Handles various helping Api functions and returns JSON formatted data
 * 
 * @author Sherwin de Jesus <sherwin.dejesus@acidgreen.com.au>
 * 
 */
class ApiController extends AbstractController
{   

    /**
     * @Route("/user", name="list", methods={"GET"})
     */
    public function list() {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->json( (array)$users );
    }

    /**
     * @Route("/user/{id}", name="show", methods={"GET"})
     */
    public function show(int $id) {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if (!$user) return new Response("",404);

        return $this->json($user);
    }

    /**
     * @Route("/user", name="create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $entityManger = $this->getDoctrine()->getManager();
        
        $user = new User();
        $body = json_decode($request->getContent());
        $user->setEmail( $body->email );
        $user->setName( $body->name );
        $user->setJiraId( $body->jira_id );
        $user->setWfmId( $body->wfm_id );
        $entityManger->persist($user);
        $entityManger->flush();        

        return $this->json(['id'=>$user->getId()]);
    }      

    /**
     * @Route("/user/{id}", name="update", methods={"PUT"})
     */
    public function update(Request $request, int $id) {
        $entityManger = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);        

        if (!$user) return new Response(null, 404);

        $body = json_decode($request->getContent());
        $user->setEmail( $body->email );
        $user->setName( $body->name );
        $user->setJiraId( $body->jira_id );
        $user->setWfmId( $body->wfm_id );
        $entityManger->flush();
        
        return new JsonResponse( $body );
    }

    /**
     * @Route("/user/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(int $id) {
        $entityManger = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if (!$user) return new Response("", 404);

        $entityManger->remove($user);
        $entityManger->flush();

        return new Response("", Response::HTTP_OK);
    }    

}
