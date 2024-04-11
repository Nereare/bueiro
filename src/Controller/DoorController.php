<?php
namespace App\Controller;

use App\Entity\Patient;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DoorController extends AbstractController {

  #[Route("/door", name: "door_main")]
  public function homepage(
    EntityManagerInterface $entityManager
  ): Response {
    $q = $entityManager->createQuery("SELECT p FROM App\Entity\Patient p WHERE p.appointDate LIKE CURRENT_DATE() ORDER BY p.appointStart ASC");
    $patients = $q->getResult();
    $q->free();
    return $this->render("door/index.html.twig", [
      "patients" => $patients
    ]);
  }

  #[Route("/door/patient/", name: "door_create_patient")]
  public function newPatient(): Response {
    return $this->render("door/patient.html.twig");
  }

  #[Route("/door/patient/save", name: "door_save_patient")]
  public function savePatient(
    Request $request,
    EntityManagerInterface $entityManager,
    ValidatorInterface $validatorInterface
  ): JsonResponse {
    $patient = new Patient();
    $patient->setName($request->request->get("name"));
    $patient->setDob(new \DateTime($request->request->get("dob")));
    $patient->setSex($request->request->get("sex"));
    $patient->setGender($request->request->get("gender"));
    $patient->setAppointDate(new \DateTime());
    $patient->setAppointStart(new \DateTime());
    $patient->setClassificationPre($request->request->get("classificationPre"));

    $errors = $validatorInterface->validate($patient);

    $return = null;
    if (count($errors) > 0) {
      $return = array(
        "success" => false,
        "msg" => (string) $errors,
        "id" => null
      );
    } else {
      $entityManager->persist($patient);
      $entityManager->flush();
      $return = array(
        "success" => true,
        "msg" => "Usuário criado com sucesso",
        "id" => $patient->getId()
      );
    }

    // Return
    return new JsonResponse($return);
  }

  #[Route("/door/evolution/{id}", name: "door_evolution")]
  public function newEvolution(
    Patient $patient
  ): Response {
    return $this->render("door/evolution.html.twig", [
      "patient" => $patient
    ]);
  }

}