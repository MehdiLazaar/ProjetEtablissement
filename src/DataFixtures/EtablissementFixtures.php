<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Enum\Visibilitee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtablissementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cheminFichier = "./donnees.csv";

        if (!file_exists($cheminFichier) || !is_readable($cheminFichier)) {
            throw new \Exception("Impossible de lire le fichier CSV.");
        }

        if (($fichier = fopen($cheminFichier, 'r')) !== false) {
            $entetes = fgetcsv($fichier, 0, ";");

            $tailleLot = 50;
            $compteur = 0;

            while (($ligne = fgetcsv($fichier, 0, ";")) !== false) {
                $donnees = array_combine($entetes, $ligne);
                $secteurEtab = strtolower(trim($donnees['secteur_public_prive_libe']));
                $secteur = match ($secteurEtab) {
                    'public' => [Visibilitee::PUBLIC],
                    'privé', 'prive' => [Visibilitee::PRIVATE],
                    default => [],
                };
                $etablissement = new Etablissement();
                $etablissement
                    ->setAppellationOfficiel($donnees['appellation_officielle'])
                    ->setDenominationPrincipale($donnees['denomination_principale'])
                    ->setLongitude((float)$donnees['longitude'])
                    ->setLatitude((float)$donnees['latitude'])
                    ->setAdresse($donnees['adresse_uai'])
                    ->setDepartement($donnees['libelle_departement'])
                    ->setCommune($donnees['libelle_commune'])
                    ->setRegion($donnees['libelle_region'])
                    ->setAcademie($donnees['libelle_academie'])
                    ->setDateOuverture(new \DateTime($donnees['date_ouverture']))
                    ->setSecteur($secteur)
                    ->setCodeDepartement((int)$donnees['code_departement'])
                    ->setCodeRegion((int)$donnees['code_region'])
                    ->setCodeAcademie((int)$donnees['code_academie'])
                    ->setCodeCommune((int)$donnees['code_commune']);

                $manager->persist($etablissement);

                if (++$compteur % $tailleLot === 0) {
                    $manager->flush();
                    $manager->clear();
                }
            }

            fclose($fichier);

            $manager->flush();
            $manager->clear();
        }
    }
}
