<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Etablissement;
use App\Form\CommentaireType;
use App\Form\EtablissementType;
use App\Repository\EtablissementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EtablissementController extends AbstractController
{
    #[Route('/etablissement', name: 'app_etablissement', methods: ['GET'])]
    public function index(EtablissementRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repo->createQueryBuilder('e')->getQuery();

        $etablissements = $paginator->paginate(
            $query,
            // Numéro de page par défaut (1)
            $request->query->getInt('page', 1),
            // Nombre d'éléments par page
            15
        );

        return $this->render('etablissement/index.html.twig', [
            'etablissements' => $etablissements,
        ]);
    }
    #[Route('/etablissements/departement/{departement}', name: 'app_etablissements_departement_nom',methods: ['GET'])]
    public function listeParDepartement(string $departement, EtablissementRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.departement = :departement')
            ->setParameter('departement', $departement)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listePardepartement.html.twig', [
            'etablissements' => $etablissements,
            'departement' => $departement,
        ]);
    }

    #[Route('/etablissements/region/{region}', name: 'app_etablissements_region_nom',methods: ['GET'])]
    public function listeParRegion(string $region, EtablissementRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.region = :region')
            ->setParameter('region', $region)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listeParregion.html.twig', [
            'etablissements' => $etablissements,
            'region' => $region,
        ]);
    }

    #[Route('/etablissements/commune/{commune}', name: 'app_etablissements_commune_nom',methods: ['GET'])]
    public function listeParCommune(string $commune, EtablissementRepository $repository,PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.commune = :commune')
            ->setParameter('commune', $commune)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listeParcommune.html.twig', [
            'etablissements' => $etablissements,
            'commune' => $commune,
        ]);
    }

    #[Route('/etablissements/academie/{academie}', name: 'app_etablissements_academie_nom',methods: ['GET'])]
    public function listeParAcademie(string $academie, EtablissementRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.academie = :academie')
            ->setParameter('academie', $academie)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listeParacademie.html.twig', [
            'etablissements' => $etablissements,
            'academie' => $academie,
        ]);
    }
    #[Route('/etablissements/departement/code/{code_departement}', name: 'app_etablissements_departement_code',methods: ['GET'])]
    public function listeParCodeDepartement(int $code_departement, EtablissementRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.code_departement = :code')
            ->setParameter('code', $code_departement)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listePardepartement.html.twig', [
            'etablissements' => $etablissements,
            'code_departement' => $code_departement,
        ]);
    }

    #[Route('/etablissements/commune/code/{code_commune}', name: 'app_etablissements_commune_code',methods: ['GET'])]
    public function listeParCodeCommune(int $code_commune, EtablissementRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.code_commune = :code')
            ->setParameter('code', $code_commune)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listeParcommune.html.twig', [
            'etablissements' => $etablissements,
            'code_commune' => $code_commune,
        ]);
    }

    #[Route('/etablissements/region/code/{code_regitgion}', name: 'app_etablissements_region_code',methods: ['GET'])]
    public function listeParCodeRegion(int $code_region, EtablissementRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.code_region = :code')
            ->setParameter('code', $code_region)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listeParregion.html.twig', [
            'etablissements' => $etablissements,
            'code_region' => $code_region,
        ]);
    }


    /*Controller*/
    #[Route('/etablissements/academie/code/{code_academie}', name: 'app_etablissements_academie_code',methods: ['GET'])]
    public function listeParCodeAcademie(int $code_academie, EtablissementRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $repository->createQueryBuilder('e')
            ->where('e.code_academie = :code')
            ->setParameter('code', $code_academie)
            ->getQuery();

        $etablissements = $paginator->paginate($query, $request->query->getInt('page', 1), 15);

        return $this->render('etablissement/listeParacademie.html.twig', [
            'etablissements' => $etablissements,
            'code_academie' => $code_academie,
        ]);
    }
    #[Route('/etablissement/cartographieCommune/{code_commune}', name: 'app_etablissement_cartographie_commune', methods: ['GET'])]
    public function cartographieCommune(int $code_commune, EtablissementRepository $repo): Response
    {
        // Récupérer uniquement les champs nécessaires pour afficher la carte
        $query = $repo->createQueryBuilder('e')
            ->select('partial e.{id,appellationOfficiel,latitude,longitude,commune,code_commune}')
            ->where('e.code_commune = :code')
            ->setParameter('code', $code_commune)
            ->getQuery();

        $etablissements = $query->getResult();

        // Pour l'affichage, on peut utiliser le nom de la commune du premier établissement (s'il existe)
        $communeName = !empty($etablissements) ? $etablissements[0]->getCommune() : 'Inconnue';

        // Récupérer la liste distincte des communes (code et nom)
        $communes = $repo->createQueryBuilder('e')
            ->select('DISTINCT e.commune AS nom, e.code_commune AS code')
            ->orderBy('e.commune', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render('etablissement/cartographie_commune.html.twig', [
            'etablissements' => $etablissements,
            'commune' => ['code' => $code_commune, 'nom' => $communeName],
            'communes' => $communes,
        ]);
    }

    #[Route('/etablissement/ajout', name: 'app_etablissement_ajout', methods: ['GET', 'POST'])]
    public function ajout(Request $request, EntityManagerInterface $em): Response
    {
        $etablissement = new Etablissement();
        $form = $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($etablissement);
            $em->flush();
            $this->addFlash('success', 'Établissement ajouté avec succès.');
            return $this->redirectToRoute('app_etablissement_show', [
                'id' => $etablissement->getId(),
            ]);
        }

        return $this->render('etablissement/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/etablissement/modifier/{id}', name: 'app_etablissement_modifier', methods: ['GET', 'POST'])]
    public function modifier(Etablissement $etablissement, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Établissement modifié avec succès.');
            return $this->redirectToRoute('app_etablissement_show', [
                'id' => $etablissement->getId(),
                ]);
        }

        return $this->render('etablissement/modif.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/etablissement/supprimer/{id}', name: 'app_etablissement_supprimer', methods: ['POST'])]
    public function supprimer(Request $request, Etablissement $etablissement, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etablissement->getId(), $request->request->get('_token'))) {
            foreach ($etablissement->getCommentaires() as $commentaire) {
                $em->remove($commentaire);
            }
            $em->remove($etablissement);
            $em->flush();
            $this->addFlash('success', 'Établissement supprimé avec succès.');
        }

        return $this->redirectToRoute('app_etablissement');
    }
    #[Route('/etablissement/confirmation-suppression/{id}', name: 'app_etablissement_confirmation_supprimer', methods: ['GET'])]
    public function confirmationSupprimer(Etablissement $etablissement): Response
    {
        return $this->render('etablissement/supprimer.html.twig', [
            'etablissement' => $etablissement
        ]);
    }
    #[Route('/etablissement/{id}', name: 'app_etablissement_show', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function VisionnageEtablissement(Etablissement $etablissement, Request $request, EntityManagerInterface $em): Response
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaire->setEtablissement($etablissement);
            $commentaire->setDateCreation(new \DateTimeImmutable());
            $em->persist($commentaire);
            $em->flush();

            $this->addFlash('success', 'Commentaire ajouté avec succès.');
            return $this->redirectToRoute('app_etablissement_show', ['id' => $etablissement->getId()]);
        }

        return $this->render('etablissement/visionnage.html.twig', [
            'etablissement' => $etablissement,
            'formCommentaire' => $form->createView(),
        ]);
    }
    #[Route('/recherche', name: 'app_etablissement_recherche', methods: ['GET'])]
    public function rechercher(Request $request): RedirectResponse
    {
        $type = $request->query->get('type');
        $query = $request->query->get('query');

        if (!$type || !$query) {
            return $this->redirectToRoute('app_etablissement'); // Redirection par défaut si vide
        }

        return match ($type) {
            'commune' => $this->redirectToRoute('app_etablissements_commune_nom', ['commune' => $query]),
            'region' => $this->redirectToRoute('app_etablissements_region_nom', ['region' => $query]),
            'academie' => $this->redirectToRoute('app_etablissements_academie_nom', ['academie' => $query]),
            'departement' => $this->redirectToRoute('app_etablissements_departement_nom', ['departement' => $query]),
            default => $this->redirectToRoute('app_etablissement'),
        };
    }
}