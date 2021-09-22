<?php

namespace App\Controller;


use App\Entity\Job\Offer;
use App\Entity\Job\PostulationDetail;
use App\Entity\Users\Freelancer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class PostulationController extends AbstractController
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    #[Route(path: "/api/postulation/{offerId}", name: 'postulation')]

    public function postuler(string $offerId):JsonResponse
    {


        $id = (int) $offerId;
        /** @var Offer $offer */
        $offer = $this->entityManager->getRepository(Offer::class)->findOneById($id);
        if(!$offer) return $this->json([
            'message' => "Offer not found"
        ]);


        $detailPostulation = new PostulationDetail();
        $detailPostulation->setFreelancers($this->getUser());
        $detailPostulation->setOffer($offer);
        $detailPostulation->setMessage("ok");

        $offer->getPostulations()->add($detailPostulation);

       $this->entityManager->persist($detailPostulation);
       $this->entityManager->flush();

        return $this->json([
            'postuler',
        ]);
    }

    #[Route(path: "/api/postulation/annuler/{postulationId}", name: 'postulation_cancul')]

    public function cancul(string $postulationId):JsonResponse
    {

        $id = (int) $postulationId;

        $postulation = $this->entityManager->getRepository(PostulationDetail::class)->findOneById($id);
        if(!$postulation) return $this->json([
            'message' => "Postulation not found"
        ]);


        $this->entityManager->remove($postulation);
        $this->entityManager->flush();

        return $this->json([
            'annuler',
        ]);
    }

}
