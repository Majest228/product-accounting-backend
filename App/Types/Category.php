<?php

namespace App\Types;

class Category extends Entity implements IEntity
{
    public $id = 0;
    public $name = '';


    public function validate()
    {
        return (
        !empty($this->name)
        );
    }
}
