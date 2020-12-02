<?php

namespace App\Controller;

use App\Entity\Filmoteca;
use App\Form\FilmotecaType;
use App\Repository\FilmotecaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/filmoteca")
 */
class FilmotecaController extends AbstractController
{
    /**
     * @Route("/", name="filmoteca_index", methods={"GET"})
     */
    public function index(FilmotecaRepository $filmotecaRepository): Response
    {
        return $this->render('filmoteca/index.html.twig', [
            'filmotecas' => $filmotecaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="filmoteca_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $filmoteca = new Filmoteca();
        $form = $this->createForm(FilmotecaType::class, $filmoteca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($filmoteca);
            $entityManager->flush();

            return $this->redirectToRoute('filmoteca_index');
        }

        return $this->render('filmoteca/new.html.twig', [
            'filmoteca' => $filmoteca,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="filmoteca_show", methods={"GET"})
     */
    public function show(Filmoteca $filmoteca): Response
    {
        return $this->render('filmoteca/show.html.twig', [
            'filmoteca' => $filmoteca,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="filmoteca_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Filmoteca $filmoteca): Response
    {
        $form = $this->createForm(FilmotecaType::class, $filmoteca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('filmoteca_index');
        }

        return $this->render('filmoteca/edit.html.twig', [
            'filmoteca' => $filmoteca,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="filmoteca_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Filmoteca $filmoteca): Response
    {
        if ($this->isCsrfTokenValid('delete'.$filmoteca->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($filmoteca);
            $entityManager->flush();
        }

        return $this->redirectToRoute('filmoteca_index');
    }
}
