<?php

namespace Busshike\ClinicBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass="Busshike\ClinicBundle\Repository\PatientsRepository")
 * @ORM\Table(name="patients")
 */
class Patients
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
    
    /**
     * @ORM\Column(type="integer" )
     */
    private $age;
    
    /**
     * @ORM\Column(type="string", length=100 )
     */
    private $phone;
    
    /**
     * @ORM\Column(type="string", length=100 )
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $address;
    
     

    /**
     * One Patient has Many Appointments.
     * @OneToMany(targetEntity="Appointments", mappedBy="patient",cascade={"all"})
     */
    private $appointment;
     
      public function __toString()
{
    return(string) $this->getName();
}
      
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->appointment = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Patients
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Patients
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Patients
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Patients
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Patients
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add appointment
     *
     * @param \Busshike\ClinicBundle\Entity\Appointments $appointment
     *
     * @return Patients
     */
    public function addAppointment(\Busshike\ClinicBundle\Entity\Appointments $appointment)
    {
        $this->appointment[] = $appointment;
        $appointment->setPatient($this);
        return $this;
    }

    /**
     * Remove appointment
     *
     * @param \Busshike\ClinicBundle\Entity\Appointments $appointment
     */
    public function removeAppointment(\Busshike\ClinicBundle\Entity\Appointments $appointment)
    {
        $this->appointment->removeElement($appointment);
        $appointment->setPatient(null);
    }

    /**
     * Get appointment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppointment()
    {
        return $this->appointment;
    }
}
