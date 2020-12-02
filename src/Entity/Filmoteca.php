<?php

namespace App\Entity;

use App\Repository\FilmotecaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmotecaRepository::class)
 */
class Filmoteca
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $titol;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $sinopsis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitol(): ?string
    {
        return $this->titol;
    }

    public function setTitol(string $titol): self
    {
        $this->titol = $titol;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getSinopsis(): ?string
    {
        return $this->sinopsis;
    }

    public function setSinopsis(?string $sinopsis): self
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }
}
