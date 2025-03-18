<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Enum\Visibilitee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $filePath = "./donnees.csv";

        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new \Exception("Impossible de lire le fichier CSV.");
        }
        if (($handle = fopen($filePath, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ";");

            $batchSize = 50;
            $count = 0;

            while (($row = fgetcsv($handle, 0, ";")) !== false) {
                $data = array_combine($headers, $row);

                $secteurCsv = strtolower(trim($data['secteur_public_prive_libe']));

                $secteur = match ($secteurCsv) {
                    'public' => [Visibilitee::PUBLIC],
                    'privé', 'prive' => [Visibilitee::PRIVATE],
                    default => [],
                };

                $etablissement = new Etablissement();
                $etablissement
                    ->setAppellationOfficiel($data['appellation_officielle'])
                    ->setDenominationPrincipale($data['denomination_principale'])
                    ->setLongitude((float)$data['longitude'])
                    ->setLatitude((float)$data['latitude'])
                    ->setAdresse($data['adresse_uai'])
                    ->setDepartement($data['libelle_departement'])
                    ->setCommune($data['libelle_commune'])
                    ->setRegion($data['libelle_region'])
                    ->setAcademie($data['libelle_academie'])
                    ->setDateOuverture(new \DateTime($data['date_ouverture']))
                    ->setSecteur($secteur)
                    ->setCodeDepartement((int)$data['code_departement'])
                    ->setCodeRegion((int)$data['code_region'])
                    ->setCodeAcademie((int)$data['code_academie'])
                    ->setCodeCommune((int)$data['code_commune']);

                $manager->persist($etablissement);

                if (++$count % $batchSize === 0) {
                    $manager->flush();
                    $manager->clear();
                }
            }

            fclose($handle);

            $manager->flush();
            $manager->clear();
        }
    }
}
