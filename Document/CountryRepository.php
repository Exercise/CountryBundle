<?php

namespace Bundle\ExerciseCom\CountryBundle\Document;

use Doctrine\ODM\MongoDB\Query;
use Bundle\ExerciseCom\CommonBundle\Document\Repository;

class CountryRepository extends Repository
{
    /**
     * Find Country by its name
     * @param   string  $name
     * @param   string  $format Should be either object or array
     * @return  Country or null if country does not exist
     */
    public function findOneByName($name, $format='object')
    {
        if (!in_array($format, array('object', 'array'))) {
            throw new Exception('invalid format: ' . $format);
        }

        $query = $this->createQuery()->field('name')->equals($name);

        if ($format == 'array') {
            $query->hydrate(false);
        }

        $country = $query->getSingleResult();

        if ($format == 'array') {
            $country = $this->cleanMongoArrayResult($country);
        }

        return $country;
    }

    /**
     * Find Country by its code
     * @param   string  $code
     * @param   string  $format Should be either object or array
     * @return  Country or null if country does not exist
     */
    public function findOneByCode($code, $format='object')
    {
        if (!in_array($format, array('object', 'array'))) {
            throw new Exception('invalid format: ' . $format);
        }

        $query = $this->createQuery()->field('code')->equals($code);

        if ($format == 'array') {
            $query->hydrate(false);
        }

        $country = $query->getSingleResult();

        if ($format == 'array') {
            $country = $this->cleanMongoArrayResult($country);
        }

        return $country;
    }

    /**
     * Find Country by its iso3
     * @param   string  $code
     * @param   string  $format Should be either object or array
     * @return  Country or null if country does not exist
     */
    public function findOneByIso3($iso3, $format='object')
    {
        if (!in_array($format, array('object', 'array'))) {
            throw new Exception('invalid format: ' . $format);
        }

        $query = $this->createQuery()->field('iso3')->equals($iso3);

        if ($format == 'array') {
            $query->hydrate(false);
        }

        $country = $query->getSingleResult();

        if ($format == 'array') {
            $country = $this->cleanMongoArrayResult($country);
        }

        return $country;
    }

    public function findAllIndexById()
    {
        $countries = array();
        $results = $this->createQuery()->sort('rank', 'asc')->sort('name','asc')->execute();
        foreach($results as $country) {
            $countries[$country->getId()] = $country;
        }

        return $countries;
    }

    public function findAll()
    {
        return $this->createQuery()->sort('rank', 'asc')->sort('name','asc');
    }

    /**
     *
     * @return int count of all items
     **/
    public function countAll()
    {
        return $this->createQuery()->count();
    }
}