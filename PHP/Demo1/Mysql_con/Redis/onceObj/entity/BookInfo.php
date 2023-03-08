<?php
class BookInfo{
    public $book_id;
    public $book_name;
    public $book_author;
    public $book_date;
    public $book_intro;
    public $book_img;
    public $remark;

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * @param mixed $book_id
     */
    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->book_name;
    }

    /**
     * @param mixed $book_name
     */
    public function setBookName($book_name)
    {
        $this->book_name = $book_name;
    }

    /**
     * @return mixed
     */
    public function getBookAuthor()
    {
        return $this->book_author;
    }

    /**
     * @param mixed $book_author
     */
    public function setBookAuthor($book_author)
    {
        $this->book_author = $book_author;
    }

    /**
     * @return mixed
     */
    public function getBookDate()
    {
        return $this->book_date;
    }

    /**
     * @param mixed $book_date
     */
    public function setBookDate($book_date)
    {
        $this->book_date = $book_date;
    }

    /**
     * @return mixed
     */
    public function getBookIntro()
    {
        return $this->book_intro;
    }

    /**
     * @param mixed $book_intro
     */
    public function setBookIntro($book_intro)
    {
        $this->book_intro = $book_intro;
    }

    /**
     * @return mixed
     */
    public function getBookImg()
    {
        return $this->book_img;
    }

    /**
     * @param mixed $book_img
     */
    public function setBookImg($book_img)
    {
        $this->book_img = $book_img;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    }



}
