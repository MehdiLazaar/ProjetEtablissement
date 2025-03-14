<?php

namespace App\Controller;

use App\Repository\EtablissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EtablissementController extends AbstractController
{
    #[Route('/etablissement', name: 'app_etablissement')]
    public function index(): Response
    {
        return $this->render('etablissement/index.html.twig', [
            'controller_name' => 'EtablissementController',
        ]);
    }
    #[Route('/etablissements/departement/{departement}', name: 'app_etablissements_departement')]
    public function listByDepartement(string $departement, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['departement' => $departement]);

        return $this->render('etablissement/list_by_departement.html.twig', [
            'etablissements'  => $etablissements,
            'departement'     => $departement,
        ]);
    }

    #[Route('/etablissements/region/{region}', name: 'app_etablissements_region')]
    public function listByRegion(string $region, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['region' => $region]);

        return $this->render('etablissement/list_by_region.html.twig', [
            'etablissements' => $etablissements,
            'region'         => $region,
        ]);
    }

    #[Route('/etablissements/commune/{commune}', name: 'app_etablissements_commune')]
    public function listByCommune(string $commune, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['commune' => $commune]);

        return $this->render('etablissement/list_by_commune.html.twig', [
            'etablissements' => $etablissements,
            'commune'        => $commune,
        ]);
    }

    #[Route('/etablissements/academie/{academie}', name: 'app_etablissements_academie')]
    public function listByAcademie(string $academie, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['academie' => $academie]);

        return $this->render('etablissement/list_by_academie.html.twig', [
            'etablissements' => $etablissements,
            'academie'       => $academie,
        ]);
    }
}
