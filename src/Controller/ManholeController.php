<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ManholeController extends AbstractController {

  #[Route("/", name: "homepage")]
  public function homepage() {
    return $this->render("manhole/index.html.twig");
  }

}