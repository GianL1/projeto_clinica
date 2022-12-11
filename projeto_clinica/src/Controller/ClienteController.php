<?php

namespace App\Controller;

use App\Entity\Cliente;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clientes", name="clientes_")
 */
class ClienteController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        return $this->json([
            'message' => 'Bem vindo a api clinica',
            'path' => 'src/Controller/ClienteController'
        ]);
    }

    /**
     * @Route("/", name="create", methods={"POST"})
     */
    public function create(Request $request, ManagerRegistry $doctrine)
    {
        $clienteData = $request->request->all();

        $cliente = new Cliente();
        $cliente->setNome($clienteData['nome']);
        $cliente->setCoCpf($clienteData['co_cpf']);

        $em = $doctrine->getManager();
        $em->persist($cliente);
        $em->flush();

        return $this->json([
            'message' => 'Cliente Cadastrado com sucesso'
        ]);
    }

    /**
     * @Route("/{productId}", name="update", methods={"PUT", "PATCH"})
     */
    public function update(Request $request, ManagerRegistry $doctrine, $productId)
    {
        $clienteData = $request->request->all();
        $manager = $doctrine->getManager();

        $cliente = $manager->getRepository(Cliente::class)->find($productId);
        $cliente->setNome($clienteData['name']);
        $cliente->setCoCpf($clienteData['co_cpf']);


        $manager->persist($cliente);
        $manager->flush();

        return $this->json([
            'message' => 'Cliente Atualizado com sucesso'
        ]);
    }
}