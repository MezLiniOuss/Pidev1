<?php

namespace CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SBC\NotificationsBundle\Model\BaseNotification;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="CourseBundle\Repository\NotificationRepository")
 */
class Notification extends BaseNotification implements \JsonSerializable
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $destinateur;

    /**
     * @return mixed
     */
    public function getDestinateur()
    {
        return $this->destinateur;
    }

    /**
     * @param mixed $destinateur
     */
    public function setDestinateur($destinateur)
    {
        $this->destinateur = $destinateur;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
