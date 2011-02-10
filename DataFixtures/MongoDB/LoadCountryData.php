<?php

namespace Bundle\ExerciseCom\CountryBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

use Bundle\ExerciseCom\CountryBundle\Document\Country;
use RuntimeException;

class LoadCountryData implements FixtureInterface
{
    public function load($manager)
    {
        if (($handle = fopen(__DIR__ . "/../../Resources/data/countries.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                list($code, $name, $iso3, $rank) = $data;
                $country = new Country();
                $country->setCode($code);
                $country->setName($name);
                $country->setIso3($iso3);
                $country->setRank($rank);
                $manager->persist($country);
            }
            fclose($handle);
        } else {
            throw new RuntimeException('Failed to parse countries');
        }

        $manager->flush(array('safe' => true));
    }
}
