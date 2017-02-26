<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity
 */
class Book {

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=50, nullable=false)
     */
    private $isbn;

    /**
     * @var integer
     *
     * @ORM\Column(name="publishingHouse", type="integer", nullable=false)
     */
    private $publishinghouse;

    /**
     * @var string
     *
     * @ORM\Column(name="originalTitle", type="string", length=255, nullable=false)
     */
    private $originaltitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_book", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idBook;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set idBook
     *
     * @param string
     *
     * @return Book
     */
    function setIdBook($idBook) {
        $this->idBook = $idBook;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Book
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Book
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set isbn
     *
     * @param string $isbn
     *
     * @return Book
     */
    public function setIsbn($isbn) {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn() {
        return $this->isbn;
    }

    /**
     * Set publishinghouse
     *
     * @param integer $publishinghouse
     *
     * @return Book
     */
    public function setPublishinghouse($publishinghouse) {
        $this->publishinghouse = $publishinghouse;

        return $this;
    }

    /**
     * Get publishinghouse
     *
     * @return integer
     */
    public function getPublishinghouse() {
        return $this->publishinghouse;
    }

    /**
     * Set originaltitle
     *
     * @param string $originaltitle
     *
     * @return Book
     */
    public function setOriginaltitle($originaltitle) {
        $this->originaltitle = $originaltitle;

        return $this;
    }

    /**
     * Get originaltitle
     *
     * @return string
     */
    public function getOriginaltitle() {
        return $this->originaltitle;
    }

    /**
     * Get idBook
     *
     * @return integer
     */
    public function getIdBook() {
        return $this->idBook;
    }

}
