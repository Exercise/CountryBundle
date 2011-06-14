<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/14/11
 * Time: 2:26 AM
 *
 */
namespace Bundle\ExerciseCom\CountryBundle\Entity;
use Doctrine\ORM\Query;
use Doctrine\ORM\EntityRepository;

class CountryRepository extends EntityRepository
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

        $query = $this->createQueryBuilder('c')
                ->where('c.name = ?1')
                ->setParameter(1,$name)
                ->getQuery();

        if ($format == 'array') {
            $query->setHydrationMode(Query::HYDRATE_ARRAY);
        } else {
            $query->setHydrationMode(Query::HYDRATE_OBJECT);
        }

        $country = $query->getSingleResult();

        /*
         * @TODO/don't really understand this part ask ornicar
         *
        if ($format == 'array') {
            $country = $this->cleanMongoArrayResult($country);
        }*/

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

        $query = $this->createQueryBuilder('c')
                        ->where('c.code = ?1')
                        ->setParameter(1,$code)
                        ->getQuery();

        if ($format == 'array') {
            $query->setHydrationMode(Query::HYDRATE_ARRAY);
        } else {
            $query->setHydrationMode(Query::HYDRATE_OBJECT);
        }

        $country = $query->getSingleResult();

        /*
         * @TODO/don't really understand this part ask ornicar
         *
        if ($format == 'array') {
            $country = $this->cleanMongoArrayResult($country);
        }*/

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

        $query = $this->createQueryBuilder('c')
                        ->where('c.iso3 = ?1')
                        ->setParameter(1,$iso3)
                        ->getQuery();

        if ($format == 'array') {
            $query->setHydrationMode(Query::HYDRATE_ARRAY);
        } else {
            $query->setHydrationMode(Query::HYDRATE_OBJECT);
        }

        $country = $query->getSingleResult();

        /*
         * @TODO/don't really understand this part ask ornicar
         *
        if ($format == 'array') {
            $country = $this->cleanMongoArrayResult($country);
        }*/

        return $country;
    }

    /**
     * Find All Countries into an Id array
     *
     * @return  array $countries The Array Countries
     */
    public function findAllIndexById()
    {
        $countries = array();

        $query = $this->createQueryBuilder('c')
                        ->orderBy('rank', 'asc')
                        ->orderBy('name', 'asc')
                        ->getQuery();

        $results = $query->execute();

        foreach($results as $country) {
            $countries[$country->getId()] = $country;
        }

        return $countries;
    }

    /**
     * Find All Countries
     *
     * @return  result from query execute
     */
    public function findAll()
    {
        $query = $this->createQueryBuilder('c')
                        ->orderBy('rank', 'asc')
                        ->orderBy('name', 'asc')
                        ->getQuery();

        return $query->execute();
    }

    /**
     * Count all items
     *
     * @return int count of all items
     **/
    public function countAll()
    {
        return $this->createQueryBuilder('count(c.id)')
                ->getQuery()
                ->getSingleScalarResult();
    }
}
