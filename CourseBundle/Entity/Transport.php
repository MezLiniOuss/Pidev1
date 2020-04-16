<?php

namespace CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transport
 *
 * @ORM\Table(name="transport")
 * @ORM\Entity(repositoryClass="CourseBundle\Repository\TransportRepository")
 */
class Transport
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
     * @ORM\Column(name="pointdepart", type="string", length=255)
     */
    private $pointdepart;

    /**
     * @var string
     *
     * @ORM\Column(name="pointArrive", type="string", length=255)
     */
    private $pointArrive;

    /**
     * @var string
     *
     * @ORM\Column(name="descrption", type="string", length=255)
     */
    private $descrption;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @var int
     *
     * @ORM\Column(name="autretel", type="integer")
     */
    private $autretel;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $client;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $transporteur;
    /**
     * @var string
     *
     * @ORM\Column(name="validation", type="string", length=255)
     */
    private $validation;
    /**
     * @var string
     *
     * @ORM\Column(name="vu", type="string", length=255)
     */
    private $vu;

    /**
     * @return mixed
     */
    public function getTransporteur()
    {
        return $this->transporteur;
    }

    /**
     * @param mixed $transporteur
     */
    public function setTransporteur($transporteur)
    {
        $this->transporteur = $transporteur;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
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
     * Set pointdepart
     *
     * @param string $pointdepart
     *
     * @return Transport
     */
    public function setPointdepart($pointdepart)
    {
        $this->pointdepart = $pointdepart;

        return $this;
    }

    /**
     * Get pointdepart
     *
     * @return string
     */
    public function getPointdepart()
    {
        return $this->pointdepart;
    }

    /**
     * Set pointArrive
     *
     * @param string $pointArrive
     *
     * @return Transport
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
     * Set descrption
     *
     * @param string $descrption
     *
     * @return Transport
     */
    public function setDescrption($descrption)
    {
        $this->descrption = $descrption;

        return $this;
    }

    /**
     * Get descrption
     *
     * @return string
     */
    public function getDescrption()
    {
        return $this->descrption;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return Transport
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set autretel
     *
     * @param integer $autretel
     *
     * @return Transport
     */
    public function setAutretel($autretel)
    {
        $this->autretel = $autretel;

        return $this;
    }

    /**
     * @return string
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * @return string
     */
    public function getVu()
    {
        return $this->vu;
    }

    /**
     * @param string $validation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;
    }

    /**
     * @param string $vu
     */
    public function setVu($vu)
    {
        $this->vu = $vu;
    }

    /**
     * Get autretel
     *
     * @return int
     */
    public function getAutretel()
    {
        return $this->autretel;
    }
}

