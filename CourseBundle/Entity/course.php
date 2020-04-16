<?php

namespace CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="CourseBundle\Repository\courseRepository")
 */
class course
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="pointDepart", type="string", length=255)
     *
     */
    private $pointDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="pointArrive", type="string", length=255)
     */
    private $pointArrive;
    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @param int $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="validation", type="string", length=255)
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="non", type="string", length=255)
     */
    private $non;

    /**
     * @var string
     *
     * @ORM\Column(name="raison", type="string", length=255)
     */
    private $raison;

    /**
     * @var string
     *
     * @ORM\Column(name="vu", type="string", length=255)
     */
    private $vu;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $client;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $chauffeur;

    /**
     * @return mixed
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * @param mixed $chauffeur
     */
    public function setChauffeur($chauffeur)
    {
        $this->chauffeur = $chauffeur;
    }

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
     * Set poitDepart
     *
     * @param string $poitDepart
     *
     * @return course
     */


    /**
     * Get poitDepart
     *
     * @return string
     */

    /**
     * Set pointArrive
     *
     * @param string $pointArrive
     *
     * @return course
     */
    public function setPointArrive($pointArrive)
    {
        $this->pointArrive = $pointArrive;

        return $this;
    }

    /**
     * Get pointArrive
     *
     * @return string
     */
    public function getPointArrive()
    {
        return $this->pointArrive;
    }

    /**
     * Set validation
     *
     * @param string $validation
     *
     * @return course
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return string
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set non
     *
     * @param string $non
     *
     * @return course
     */
    public function setNon($non)
    {
        $this->non = $non;

        return $this;
    }

    /**
     * Get non
     *
     * @return string
     */
    public function getNon()
    {
        return $this->non;
    }

    /**
     * Set raison
     *
     * @param string $raison
     *
     * @return course
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;

        return $this;
    }

    /**
     * Get raison
     *
     * @return string
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * Set vu
     *
     * @param string $vu
     *
     * @return course
     */
    public function setVu($vu)
    {
        $this->vu = $vu;

        return $this;
    }

    /**
     * Get vu
     *
     * @return string
     */
    public function getVu()
    {
        return $this->vu;
    }

    /**
     * Set client
     *
     * @param \UserBundle\Entity\User $client
     *
     * @return course
     */
    public function setClient(\UserBundle\Entity\User $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \UserBundle\Entity\User
     */
    public function getClient()
    {
        return $this->client;
    }
    /**
     * @return string
     *
     */
    public function getPointDepart()
    {
        return $this->pointDepart;
    }

    /**
     * @param string $pointDepart
     */
    public function setPointDepart($pointDepart)
    {
        $this->pointDepart = $pointDepart;
    }
}
