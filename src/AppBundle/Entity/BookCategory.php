<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookCategory
 *
 * @ORM\Table(name="book_category", indexes={@ORM\Index(name="id_book", columns={"id_book"}), @ORM\Index(name="id_category", columns={"id_category"})})
 * @ORM\Entity
 */
class BookCategory
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
     * @var \AppBundle\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_book", referencedColumnName="id_book")
     * })
     */
    private $idBook;

    /**
     * @var \AppBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id_category")
     * })
     */
    private $idCategory;



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
     * Set idBook
     *
     * @param \AppBundle\Entity\Book $idBook
     *
     * @return BookCategory
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
     * Set idCategory
     *
     * @param \AppBundle\Entity\Category $idCategory
     *
     * @return BookCategory
     */
    public function setIdCategory(\AppBundle\Entity\Category $idCategory = null)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return \AppBundle\Entity\Category
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }
}
