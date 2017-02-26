<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Author;
use AppBundle\Entity\BookAuthor;
use AppBundle\Entity\Role;
use AppBundle\Form\BookAuthorType;
use AppBundle\Form\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LibraryController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function listBooksAction(Request $request) {
        $books = $this
                ->getDoctrine()
                ->getRepository("AppBundle:Book")
                ->findAll();

        return $this->render('library/index.html.twig', [
                    'books' => $books
        ]);
    }

    /**
     * @Route("/book/create", name="bookCreate")
     */
    public function createBookAction(Request $request) {
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            $this->addFlash(
                    'notice', 'Book added'
            );

            return $this->redirectToRoute('addAuthorToBook', [
                        'id_book' => $book->getIdBook()
            ]);
        }

        if (count($form->getErrors()) > 0) {
            $this->addFlash(
                    'error', 'A problem occured.<br>' . $form->getErrors()
            );
        }

        return $this->render('library/book/create.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/addAuthor/{id_book}", name="addAuthorToBook")
     */
    public function addAuthorToBookAction(Request $request, $id_book) {
        $bookAuthor = new BookAuthor();

        $form = $this->createForm(BookAuthorType::class, $bookAuthor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($bookAuthor);
            $em->flush();

            $this->addFlash(
                    'notice', 'Author added to book.'
            );

            return $this->redirectToRoute('homepage');
        }

        if (count($form->getErrors()) > 0) {
            $this->addFlash(
                    'error', 'A problem occured.<br>' . $form->getErrors()
            );
        }

        return $this->render('library/book/addAuthor.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/edit/{id_book}", name="bookEdit")
     */
    public function editBookAction(Request $request, $id_book) {
        $book = $this
                ->getDoctrine()
                ->getRepository('AppBundle:Book')
                ->find($id_book);

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            $this->addFlash(
                    'notice', 'Book added'
            );

            return $this->redirectToRoute('homepage');
        }

        if (count($form->getErrors()) > 0) {
            $this->addFlash(
                    'error', 'A problem occured.<br>' . $form->getErrors()
            );
        }

        return $this->render('library/book/edit.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/delete/{id_book}", name="bookDelete")
     */
    public function deleteBookAction(Request $request, $id_book) {
        $em = $this->getDoctrine()->getManager();
        $book = $this
                ->getDoctrine()
                ->getRepository('AppBundle:Book')
                ->find($id_book);

        $em->remove($book);
        $em->flush();

        $this->addFlash(
                'notice', 'Book has been successfully removed.'
        );

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/book/details/{id_book}", name="bookDetails")
     */
    public function detailsBookAction(Request $request, $id_book) {
        $book = $this->getBookDetails($id_book);
        $authors = $this->getAuthorBookDetails($id_book);

//var_dump ($book);
        return $this->render('library/book/details.html.twig', [
                    'book' => $book,
                    'authors' => $authors
        ]);
    }

    // ADDITIONAL FUNCTIONS

    /**
     * Get all details about book
     * 
     * @return result of query
     */
    public function getBookDetails($id_book) {

        $em = $this->get('doctrine')->getEntityManager();
        $qb = $em->createQueryBuilder('b');

        $qb->select('b')
                ->from('AppBundle:Book', 'b')
                ->where('b.idBook = :idBook')
                ->setParameter('idBook', $id_book);

        $query = $qb->getQuery();
        return $query->getResult();
    }

    /**
     * Get all authors of book
     * 
     * @return result of query
     */
    public function getAuthorBookDetails($id_book) {

        $em = $this->get('doctrine')->getEntityManager();
        $qb = $em->createQueryBuilder('b');

        $qb->select('a', 'r')
                ->from('AppBundle:Book', 'b')
                ->innerJoin('AppBundle:BookAuthor', 'ba', 'WITH', 'ba.idBook = b.idBook')
                ->innerJoin('AppBundle:Author', 'a', 'WITH', 'ba.idAuthor = a.idAuthor')
                ->innerJoin('AppBundle:Role', 'r', 'WITH', 'r.idRole = ba.idRole')
                ->where('b.idBook = :idBook')
                ->setParameter('idBook', $id_book);

        $query = $qb->getQuery();
        return $query->getScalarResult();
    }

}
