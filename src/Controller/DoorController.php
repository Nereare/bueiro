<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DoorController extends AbstractController {

  #[Route("/door", name: "door_main")]
  public function homepage() {
    return $this->render("manhole/door.html.twig");
  }

}