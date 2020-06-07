<?php


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Promo
 *
 * @ORM\Table(name="promo", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_71D2B5FFFF7747B4", columns={"titre"}), @ORM\UniqueConstraint(name="UNIQ_71D2B5FF77153098", columns={"code"})})
 * @ORM\Entity
 */
class Promo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=50, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="decimal", precision=10, scale=3, nullable=false)
     */
    private $valeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dated", type="datetime", nullable=false)
     */
    private $dated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datef", type="datetime", nullable=false)
     */
    private $datef;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;

  /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


     /**
     * Set code
     *
     * @param string $code
     *
     * @return Promo
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }


     /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Promo
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }



      /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return Promo
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }


    /**
     * Set dated.
     *
     * @param \DateTime $dated
     *
     * @return Promo
     */
    public function setDated($dated)
    {
        $this->dated = $dated;

        return $this;
    }

    /**
     * Get dated.
     *
     * @return \DateTime
     */
    public function getDated()
    {
        return $this->dated;
    }
    
     /**
     * Set datef.
     *
     * @param \DateTime $datef
     *
     * @return Promo
     */
    public function setDatef($datef)
    {
        $this->datef = $datef;

        return $this;
    }

    /**
     * Get datef.
     *
     * @return \DateTime
     */
    public function getDatef()
    {
        return $this->datef;
    }
    
    
}
