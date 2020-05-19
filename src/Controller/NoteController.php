<?php

namespace App\Controller;

use App\Form\NoteType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NoteController extends AbstractController
{
    /**
     * @var UserRepository
     */

    private $repository;

    /**
     * @var ObjectManager
     */

    private $em;
    public function __construct(UserRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

/**
 * @Route("/note/edit/{id<\d+>?0}", name="note_edit")
 * @param $id
 * @param Request $request     * @param ObjectManager $em
 * @return \Symfony\Component\HttpFoundation\Response
 */
    public function edit($id,Request $request)
    {
        $note=$this->repository->find($id);

        $form = $this->createForm(NoteType::class,$note);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            // return $this->redirectToRoute('home');
        }

    return $this->render('note/index.html.twig', [
    'note' => $note,
    'form' => $form->createView()
    ]);
    }

}