<?php

namespace App\Controller;

use App\Repository\EtablissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EtablissementController extends AbstractController
{
    #[Route('/etablissement', name: 'app_etablissement')]
    public function index(EtablissementRepository $repo): Response
    {
        $etablissements = $repo->findAll();
        return $this->render('etablissement/index.html.twig', [
            'etablissements' => $etablissements,
        ]);
    }
    #[Route('/etablissements/departement/{departement}', name: 'app_etablissements_departement_nom')]
    public function listeParDepartement(string $departement, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['departement' => $departement]);

        return $this->render('etablissement/listePardepartement.html.twig', [
            'etablissements'  => $etablissements,
            'departement'     => $departement,
        ]);
    }

    #[Route('/etablissements/region/{region}', name: 'app_etablissements_region_nom')]
    public function listeParRegion(string $region, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['region' => $region]);

        return $this->render('etablissement/listeParregion.html.twig', [
            'etablissements' => $etablissements,
            'region'         => $region,
        ]);
    }

    #[Route('/etablissements/commune/{commune}', name: 'app_etablissements_commune_nom')]
    public function listeParCommune(string $commune, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['commune' => $commune]);

        return $this->render('etablissement/listeParcommune.html.twig', [
            'etablissements' => $etablissements,
            'commune'        => $commune,
        ]);
    }

    #[Route('/etablissements/academie/{academie}', name: 'app_etablissements_academie_nom')]
    public function listeParAcademie(string $academie, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['academie' => $academie]);

        return $this->render('etablissement/listeParacademie.html.twig', [
            'etablissements' => $etablissements,
            'academie'       => $academie,
        ]);
    }
    #[Route('/etablissements/departement/code/{code_departement}', name: 'app_etablissements_departement_code')]
    public function listeParCodeDepartement(int $code_departement, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['code_departement' => $code_departement]);

        return $this->render('etablissement/listePardepartement.html.twig', [
            'etablissements'   => $etablissements,
            'code_departement' => $code_departement,
        ]);
    }

    #[Route('/etablissements/commune/code/{code_commune}', name: 'app_etablissements_commune_code')]
    public function listeParCodeCommune(int $code_commune, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['code_commune' => $code_commune]);

        return $this->render('etablissement/listeParcommune.html.twig', [
            'etablissements' => $etablissements,
            'code_commune'   => $code_commune,
        ]);
    }

    #[Route('/etablissements/region/code/{code_region}', name: 'app_etablissements_region_code')]
    public function listeParCodeRegion(int $code_region, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['code_region' => $code_region]);

        return $this->render('etablissement/listeParregion.html.twig', [
            'etablissements' => $etablissements,
            'code_region'    => $code_region,
        ]);
    }

    #[Route('/etablissements/academie/code/{code_academie}', name: 'app_etablissements_academie_code')]
    public function listeParCodeAcademie(int $code_academie, EtablissementRepository $repository): Response
    {
        $etablissements = $repository->findBy(['code_academie' => $code_academie]);

        return $this->render('etablissement/listeParacademie.html.twig', [
            'etablissements'  => $etablissements,
            'code_academie'   => $code_academie,
        ]);
    }
}