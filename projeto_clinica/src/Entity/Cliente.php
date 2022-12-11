<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 * @ORM\Table(name="clientes")
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $nome = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?int $co_cpf = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     */
    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return int|null
     */
    public function getCoCpf(): ?int
    {
        return $this->co_cpf;
    }

    /**
     * @param int|null $co_cpf
     */
    public function setCoCpf(?int $co_cpf): void
    {
        $this->co_cpf = $co_cpf;
    }

   
}
