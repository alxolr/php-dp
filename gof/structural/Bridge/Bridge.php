<?php

/**
 * Class BridgeBook
 */
abstract class BridgeBook
{
    /**
     * @var
     */
    private $author;
    /**
     * @var
     */
    private $title;
    /**
     * @var BridgeBookImp
     */
    private $implementation;

    /**
     * @param $author
     * @param $title
     * @param BridgeBookImp $implementation
     */
    function __construct($author, $title, BridgeBookImp $implementation)
    {
        $this->$author = $author;
        $this->$title = $title;
        $this->implementation = $implementation;
    }

    /**
     * @return mixed
     */
    public function showTitle()
    {
        return $this->implementation->showTitle($this->title);
    }

    /**
     * @return mixed
     */
    public function showAuthor()
    {
        return $this->implementation->showAuthor($this->author);
    }
}

/**
 * Class BridgeBookImp
 */
abstract class BridgeBookImp
{
    /**
     * @param $author
     * @return mixed
     */
    abstract function showAuthor($author);

    /**
     * @param $title
     * @return mixed
     */
    abstract function showTitle($title);
}

/**
 * Class BridgeBookCapsImp
 */
class BridgeBookCapsImp extends BridgeBookImp
{
    /**
     * @param $author
     * @return string
     */
    function showAuthor($author)
    {
        return strtoupper($author);
    }

    /**
     * @param $title
     * @return string
     */
    function showTitle($title)
    {
        return strtoupper($title);
    }
}

/**
 * Class BridgeBookStarsImp
 */
class BridgeBookStarsImp extends BridgeBookImp
{
    /**
     * @param $author_in
     * @return mixed
     */
    function showAuthor($author_in)
    {
        return Str_replace(" ", "*", $author_in);
    }

    /**
     * @param $title_in
     * @return mixed
     */
    function showTitle($title_in)
    {
        return Str_replace(" ", "*", $title_in);
    }
}

/**
 * Class BridgeBookInformation
 */
class BridgeBookInformation extends BridgeBook
{
    /**
     * @return string
     */
    public function showTitleAuthor()
    {
        return $this->showTitle() . " by " . $this->showAuthor();
    }
}

/**
 * Class BridgeBookOtherInformation
 */
class BridgeBookOtherInformation extends BridgeBook
{
    /**
     * @return string
     */
    public function showAuthorTitle()
    {
        return $this->showAuthor() . "'s " . $this->showTitle();
    }
}

$book = new BridgeBookInformation("Larry Truett", "PHP for Cats", new BridgeBookCapsImp());
echo $book->showTitleAuthor();

$book = new BridgeBookOtherInformation("Larry Truett", "PHP for Cats", new BridgeBookStarsImp());
echo $book->showAuthorTitle();
