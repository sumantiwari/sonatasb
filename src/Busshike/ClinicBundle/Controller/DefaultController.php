<?php

namespace Busshike\ClinicBundle\Controller;

use Busshike\ClinicBundle\Entity\Appointments;
use Busshike\ClinicBundle\Form\AppointmentType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('BusshikeClinicBundle:Default:index.html.twig');
    }

    public function successAction() {
        return $this->render('BusshikeClinicBundle:Default:index.html.twig');
    }

    public function newAction(Request $request) {
        // create a task and give it some dummy data for this example
        $appointment = new Appointments();
        $appointment->setTime(new DateTime("05:02 AM"));
        $appointment->setDate(new DateTime('tomorrow'));
//        $appointment->setPatient('S K Tiwari1');

//       

        $form = $this->createForm(AppointmentType::class, $appointment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $appointment = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();

            return $this->redirectToRoute('busshike_clinic_new_submited');
        }


        return $this->render('BusshikeClinicBundle:default:new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
