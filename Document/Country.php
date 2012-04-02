<?php

namespace Exercise\CountryBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\PersistentCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(
 *   collection="country",
 *   repositoryClass="Exercise\CountryBundle\Document\CountryRepository"
 * )
 * @MongoDB\Index(keys={"code"="asc"})
 */
class Country
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $code;

    /**
     * @MongoDB\String
     * @MongoDB\UniqueIndex()
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $iso3;

    /**
     * @MongoDB\Int
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
