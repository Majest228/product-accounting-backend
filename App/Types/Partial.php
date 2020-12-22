<?php
namespace App\Types;

class Partial {
    public $column = null;
    public $direction = null;
    public $page = null;
    public $size = null;

    function __construct($payload)
    {
        foreach ($payload as $key => $value) {
            $this->$key = $value;
        }
    }
    public function isOrdered() {
        return $this->column != null && $this->direction != null;
    }
    public function isPaging() {
        return $this->page != null && $this->size != null;
    }
}