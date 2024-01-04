<?php
namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientFormType extends AbstractType
{
  public function buildForm(
    FormBuilderInterface $builder,
    array $options
  ): void {
    $builder
      ->add("name")
      ->add("dob", DateType::class)
      ->add("sex", ChoiceType::class, [
        "choices" => [
          "Feminino" => "f",
          "Masculino" => "m",
          "Intersexo" => "i",
          "Outro" => "x"
        ]
      ])
      ->add("gender", ChoiceType::class, [
        "choices" => [
          "Mulher" => "f",
          "Homem" => "m",
          "Não-Binário" => "i",
          "Outro" => "i"
        ]
      ])
      ->add("save", SubmitType::class, [
        "label" => "Salvar Paciente"
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void {
    $resolver->setDefaults([
      'data_class' => Patient::class,
    ]);
  }
}
