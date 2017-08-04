<?php
//create ToDo class 
class ToDo {
    private $id;
    private $title;
    private $complete;
// constract function with id, title and status set to 0 or empty string
    public function __construct() {
        $this->id = 0;
        $this->title = '';
        $this->complete = 0;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }
    public function getComplete() {
        return $this->complete;
    }
    public function setComplete($value) {
        $this->complete = $value;
    }
}
?>