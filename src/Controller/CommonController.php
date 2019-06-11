<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\WFMUser;

class CommonController extends AbstractController
{

    /**
     * @Route("/wfmsummary")
     */
    public function wfnSummary(){        
        return $this->render('common/summary.html.twig',['dt'=>date('Y-m-d H:i:s')]);        
    }

    /**
     * @Route("/wfmid/{email}")
     */
    public function getWFMId($email) {
        $wfmUser = $this->getDoctrine()->getRepository(WFMUser::class)->findOneBy(['email' => $email]);

        if (!$wfmUser) 
            return new Response("", Response::HTTP_NOT_FOUND);

        return new JsonResponse(['wfm_id'=>$wfmUser->getId()], Response::HTTP_OK);
    }
}
