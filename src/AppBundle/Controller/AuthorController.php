<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Form\AuthorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends Controller {

    /**
     * Show all authors of book
     * 
     * @Route("/author/list", name="listAuthors")
     * 
     */
    public function showAuthors(Request $request) {
        $authors = $this
                ->getDoctrine()
                ->getRepository("AppBundle:Author")
                ->findAll();

        return $this->render('library/author/list.html.twig', [
                    'authors' => $authors
        ]);
    }

    /**
     * @Route("/author/create", name="authorCreate")
     */
    public function createAuthorAction(Request $request) {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();

            $this->addFlash(
                    'notice', 'Author added'
            );

            return $this->redirectToRoute('listAuthors');
        }

        if (count($form->getErrors()) > 0) {
            $this->addFlash(
                    'error', 'A problem occured.<br>' . $form->getErrors()
            );
        }

        return $this->render('library/author/create.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/author/edit/{id_author}", name="authorEdit")
     */
    public function editAuthorAction(Request $request, $id_author) {
        $author = $this
                ->getDoctrine()
                ->getRepository('AppBundle:Author')
                ->find($id_author);

        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();

            $this->addFlash(
                    'notice', 'Changes on author has been saved.'
            );

            return $this->redirectToRoute('listAuthors');
        }

        if (count($form->getErrors()) > 0) {
            $this->addFlash(
                    'error', 'A problem occured.<br>' . $form->getErrors()
            );
        }

        return $this->render('library/author/edit.html.twig', [
                    'form' => $form->createView()
        ]);
    }

}
