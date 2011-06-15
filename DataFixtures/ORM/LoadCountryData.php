<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/14/11
 * Time: 2:26 AM
 *
 */

namespace Bundle\ExerciseCom\CountryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

use Bundle\ExerciseCom\CountryBundle\Entity\Country;
use RuntimeException;

class LoadCountryData implements OrderedFixtureInterface, FixtureInterface
{
    public function getOrder()
    {
        return 50;
    }

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
