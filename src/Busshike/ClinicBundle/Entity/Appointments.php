<?php

namespace Busshike\ClinicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass="Busshike\ClinicBundle\Repository\AppointmentsRepository")
 * @ORM\Table(name="appointments")
 */
class Appointments
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;
    
    /**
     * @ORM\Column(type="time" )
     */
    private $time;
    
    
    
    /**
     * Many Appointments have One Patients.
     * @ManyToOne(targetEntity="Patients", inversedBy="appointment")
     * @JoinColumn(name="patients_id", referencedColumnName="id")
     */
    private $patient;
    

     
      public function __toString()
{
    return(string) $this->getPatient();
}

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Appointments
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Appointments
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set patient
     *
     * @param \Busshike\ClinicBundle\Entity\Patients $patient
     *
     * @return Appointments
     */
    public function setPatient(\Busshike\ClinicBundle\Entity\Patients $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \Busshike\ClinicBundle\Entity\Patients
     */
    public function getPatient()
    {
        return $this->patient;
    }
}
