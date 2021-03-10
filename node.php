<?php

    /**
     * Node class used for storing data of the books.
     *
     * 
     *
     * Author: lucosmo
     */

class Node {
    private $id;
    private $author;
    private $title;
    private $genre;
    private $price;
    private $publish_date;
    private $description;

    /**
     * Constructor of Node class.
     *
     * @param getXML() of xmlparser class $array
     * @return void
     */

    function __construct($array) {
        $this->id = $array["id"];
        $this->author = $array["author"];
        $this->title = $array["title"];
        $this->genre = $array["genre"];
        $this->price = $array["price"];
        $this->publish_date = $array["publish_date"];
        $this->description = $array["description"];
    }

    /**
     * Set of access functions to private Node's attributes.
     *
     * 
     * @return string
     */

    private function getID() {
        return $this->id;
    }

    public function getAuthor() {
        return $this->author;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getGenre() {
        return $this->genre;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function getDate() {
        return $this->publish_date;
    }
    
    public function getDescription() {
        return $this->description;
    }

    /**
     * magic function which decides how Node object
     * behaves when is cast as s string 
     * 
     * @return string
     */

    
    public function __toString() {
        $string=vsprintf("ID: %8s\nAuthor: %8s\nTitle: %8s\n",array($this->getID(),$this->getAuthor(),$this->getTitle()));
        $string.=vsprintf("Genre: %8s\nPrice: %8s\nPublication date: %8s\n",array($this->getGenre(),$this->getPrice(),$this->getDate()));
        $string.=vsprintf("Description: %8s\n",$this->getDescription());
        return $string;
    }

}

?>