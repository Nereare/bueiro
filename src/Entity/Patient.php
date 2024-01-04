<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dob = null;

    #[ORM\Column(length: 1)]
    private ?string $sex = null;

    #[ORM\Column(length: 1)]
    private ?string $gender = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $appointDate = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $appointStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $appointEnd = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $outcome = null;

    #[ORM\Column(nullable: true)]
    private ?array $todo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDob(): ?\DateTimeInterface
    {
        return $this->dob;
    }

    public function setDob(\DateTimeInterface $dob): static
    {
        $this->dob = $dob;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): static
    {
        $this->sex = $sex;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAppointStart(): ?\DateTimeInterface
    {
        return $this->appointStart;
    }

    public function setAppointStart(\DateTimeInterface $appointStart): static
    {
        $this->appointStart = $appointStart;

        return $this;
    }

    public function getAppointEnd(): ?\DateTimeInterface
    {
        return $this->appointEnd;
    }

    public function setAppointEnd(?\DateTimeInterface $appointEnd): static
    {
        $this->appointEnd = $appointEnd;

        return $this;
    }

    public function getOutcome(): ?string
    {
        return $this->outcome;
    }

    public function setOutcome(?string $outcome): static
    {
        $this->outcome = $outcome;

        return $this;
    }

    public function getAppointDate(): ?\DateTimeInterface
    {
        return $this->appointDate;
    }

    public function setAppointDate(\DateTimeInterface $appointDate): static
    {
        $this->appointDate = $appointDate;

        return $this;
    }

    public function getTodo(): ?array
    {
        return $this->todo;
    }

    public function setTodo(?array $todo): static
    {
        $this->todo = $todo;

        return $this;
    }
}
