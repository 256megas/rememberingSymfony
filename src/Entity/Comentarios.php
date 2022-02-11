<?php

namespace App\Entity;

use App\Repository\ComentariosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComentariosRepository::class)
 */
class Comentarios
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombreAutor;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $emailAutor;

    /**
     * @ORM\Column(type="text")
     */
    private $comentario;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreAutor(): ?string
    {
        return $this->nombreAutor;
    }

    public function setNombreAutor(string $nombreAutor): self
    {
        $this->nombreAutor = $nombreAutor;

        return $this;
    }

    public function getEmailAutor(): ?string
    {
        return $this->emailAutor;
    }

    public function setEmailAutor(string $emailAutor): self
    {
        $this->emailAutor = $emailAutor;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
