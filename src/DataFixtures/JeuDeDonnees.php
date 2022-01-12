<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class JeuDeDonnees extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        //Definiton entreprises
        $listeEntreprise = array(); 
        $nombreEntreprise = 20; 
        for ($i = 0; $i < $nombreEntreprise; $i++)
        {
            $nom = $faker -> domainWord();

            $entreprise = new Entreprise();
            $entreprise -> setActivite(implode(' ', $faker->words($nb = 3, $asText = false)) . '.');
            $entreprise -> setAdresse($faker -> address());
            $entreprise -> setNom($nom);
            $entreprise -> setURLSite("https://" . strtolower($nom) . $faker->tld());
            $manager->persist($entreprise);
            array_push($listeEntreprise, $entreprise);
        }

        //Definiton formations
        $formation1 = new Formation();
        $formation1 -> setNomCourt("DUT Informatique");
        $formation1 -> setNomLong("DUT en Informatique");

        $formation2 = new Formation();
        $formation2 -> setNomCourt("LP Multimédia");
        $formation2 -> setNomLong("Licence Professionnelle en Multimédia");
        
        $formation3 = new Formation();
        $formation3 -> setNomCourt("DUT Info & Com");
        $formation3 -> setNomLong("DUT de l’Information et de la Communication");

        $lsFormation = array($formation1, $formation2, $formation3);

        foreach($lsFormation as $formation) 
        {
            $manager->persist($formation);  
        }

        //Definiton stages
        $nbStages = 30;
        for ($i = 0; $i < $nbStages; $i++) 
        {
            $stage = new Stage();
            $stage -> setTitre(implode(' ', $faker->words($nb = 3, $asText = false)) . '.');
            $stage -> setDescMission(implode(' ', $faker->words($nb = 20, $asText = false)) . '.');
            $stage -> setEmailContact($faker->email());
            $stage -> setEntreprise($listeEntreprise[$faker->numberBetween($min = 0, $max = $nombreEntreprise - 1)]);

            $nbFormation = $faker->numberBetween($min = 1, $max = count($lsFormation));
            $depart = $faker->numberBetween($min = 1, $max = count($lsFormation));
            for ($j = 0; $j < $nbFormation; $j++) 
            {
                $formationIndex = $depart + $j;
                if ($formationIndex >= count($lsFormation)) 
                {
                    $formationIndex -= count($lsFormation);
                }
                $stage -> addFormation($lsFormation[$formationIndex]);
            }

            $manager->persist($stage);
        }

        $manager->flush();
    }
}
