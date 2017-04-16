<?php

class Book implements Serializable {
    private $id, $title, $author, $isbn, $category, $loanId;

    /**
     * Book constructor.
     * @param $id
     * @param $title
     * @param $author
     * @param $isbn
     * @param $category
     * @param $loanId
     */
    public function __construct($id, $title, $author, $isbn, $category, $loanId) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->category = $category;
        $this->loanId = $loanId;
    }

    /**
     * @return string
     */
    public function serialize() {
        return serialize([
            $this->id,
            $this->title,
            $this->author,
            $this->isbn,
            $this->category,
            $this->loanId
        ]);
    }

    /**
     * @param string $data
     */
    public function unserialize($data) {
        list(
            $this->id,
            $this->title,
            $this->author,
            $this->isbn,
            $this->category,
            $this->loanId
            ) = unserialize($data);
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author) {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getIsbn() {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category) {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getLoanId() {
        return $this->loanId;
    }

    /**
     * @param mixed $loanId
     */
    public function setLoanId($loanId) {
        $this->loanId = $loanId;
    }
}