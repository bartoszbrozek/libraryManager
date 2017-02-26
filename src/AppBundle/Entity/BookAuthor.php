<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookAuthor
 *
 * @ORM\Table(name="book_author", indexes={@ORM\Index(name="id_author", columns={"id_author"}), @ORM\Index(name="id_book", columns={"id_book"}), @ORM\Index(name="id_role", columns={"id_role"})})
 * @ORM\Entity
 */
class BookAuthor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Author
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_author", referencedColumnName="id_author")
     * })
     */
    private $idAuthor;

    /**
     * @var \AppBundle\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_book", referencedColumnName="id_book")
     * })
     */
    private $idBook;

    /**
     * @var \AppBundle\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="id_role")
     * })
     */
    private $idRole;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idAuthor
     *
     * @param \AppBundle\Entity\Author $idAuthor
     *
     * @return BookAuthor
     */
    public function setIdAuthor(\AppBundle\Entity\Author $idAuthor = null)
    {
        $this->idAuthor = $idAuthor;

        return $this;
    }

    /**
     * Get idAuthor
     *
     * @return \AppBundle\Entity\Author
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }

    /**
     * Set idBook
     *
     * @param \AppBundle\Entity\Book $idBook
     *
     * @return BookAuthor
     */
    public function setIdBook(\AppBundle\Entity\Book $idBook = null)
    {
        $this->idBook = $idBook;

        return $this;
    }

    /**
     * Get idBook
     *
     * @return \AppBundle\Entity\Book
     */
    public function getIdBook()
    {
        return $this->idBook;
    }

    /**
     * Set idRole
     *
     * @param \AppBundle\Entity\Role $idRole
     *
     * @return BookAuthor
     */
    public function setIdRole(\AppBundle\Entity\Role $idRole = null)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get idRole
     *
     * @return \AppBundle\Entity\Role
     */
    public function getIdRole()
    {
        return $this->idRole;
    }
}
