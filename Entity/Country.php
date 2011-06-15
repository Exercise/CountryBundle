<?php
/**
 * Created by Luis Cordova <cordoval@gmail.com>.
 * User: cordoval
 * Date: 6/14/11
 * Time: 2:26 AM
 *
 */
namespace Bundle\ExerciseCom\CountryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Bundle\ExerciseCom\CountryBundle\Entity\CountryRepository")
 *
 * @ORM\Table(name="country")
 *
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=false, length="10")
     *
     * @Assert\NotBlank(message="Please enter country code", groups="CreateCountry")
     * @Assert\MaxLength(limit="10", message="Try shortening country code", groups="CreateCountry")
     *
     * @var string $code
     */
    protected $code;

    /**
     * @ORM\Column(type="string", unique=true, length="32")
     *
     * @Assert\NotBlank(message="Please enter country name", groups="CreateCountry")
     * @Assert\MaxLength(limit="32", message="Try shortening country name", groups="CreateCountry")
     *
     * @var string $name
     */
    protected $name;

    /**
     * @ORM\Column(type="string", unique=false, length="3")
     * @Assert\NotBlank(message="Please enter ISO3 country code", groups="CreateCountry")
     *
     * @var string $iso3
     */
    protected $iso3;

    /**
     * @ORM\Column(type="integer")
     */
    protected $rank;

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set iso3
     *
     * @param string $iso3
     */
    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;
    }

    /**
     * Get iso3
     *
     * @return string $iso3
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * Get rank
     *
     * @return integer $rank
     */
    public function getRank()
    {
        return $this->rank;
    }
}