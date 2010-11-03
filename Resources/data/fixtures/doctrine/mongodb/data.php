<?php

/**
 * Countries
 */
use Bundle\ExerciseCom\CountryBundle\Document\Country;

$num = 1;
if (($handle = fopen(__DIR__ . "/../../../countries.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        list($code, $name, $iso3, $rank) = $data;
        ${'country' . $num} = new Country();
        ${'country' . $num}->setCode($code);
        ${'country' . $num}->setName($name);
        ${'country' . $num}->setIso3($iso3);
        ${'country' . $num}->setRank($rank);
        $num++;
    }
    fclose($handle);
}

