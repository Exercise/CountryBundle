<?php
namespace Bundle\ExerciseCom\CountryBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\PersistentCollection;

/**
 * @mongodb:Document(
 *   collection="country",
 *   repositoryClass="Bundle\ExerciseCom\CountryBundle\Document\CountryRepository"
 * )
 * @mongodb:UniqueIndex(keys={"code"="asc"}, options={"unique"="true", "dropDups"="true"})
 */
class Country
{
    /**
     * @mongodb:Id
     */
    protected $id;

    /**
     * @mongodb:String
     * @mongodb:UniqueIndex()
     */
    protected $code;

    /**
     * @mongodb:String
     * @mongodb:UniqueIndex()
     */
    protected $name;

    /**
     * @mongodb:String
     * @mongodb:UniqueIndex()
     */
    protected $iso3;

    /**
     * @mongodb:Int
     */
    protected $rank;

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIso3()
    {
        return $this->iso3;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;
    }

    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    public function __toString()
    {
        return $this->name;
    }
}
