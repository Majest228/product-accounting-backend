<?php

namespace App\Types;

class Manufactur extends Entity implements IEntity {
    public $id = 0;
    public $name = '';

    public function validate() {
        return !empty($this->name);
    }
}