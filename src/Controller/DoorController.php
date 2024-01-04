<?php
namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoorController extends AbstractController {

  #[Route("/door", name: "door_main")]
  public function homepage(EntityManagerInterface $entityManager): Response {
    $q = $entityManager->createQuery("SELECT p FROM App\Entity\Patient p WHERE p.appointDate LIKE CURRENT_DATE() ORDER BY p.appointStart");
    $patients = $q->getResult();
    return $this->render("door/index.html.twig", [
      "patients" => $patients
    ]);
  }

  #[Route("/door/patient/", name: "door_create_patient")]
  public function newPatient(
    Request $request,
    EntityManagerInterface $entityManager
  ): Response {
    $patient = new Patient();
    $form = $this->createForm(PatientFormType::class, $patient);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->persist($patient);
      $entityManager->flush();
      return $this->redirectToRoute("door_main");
    }

    return $this->render("door/patient.html.twig", [
      "form" => $form->createView(),
    ]);
  }

}