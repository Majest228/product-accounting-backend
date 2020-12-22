<?php

namespace App\Types;
interface IEntity {
    public function validate();
}
class Entity
{
    function __construct($payload)
    {
        foreach ($payload as $key => $value) {
            $this->$key = $value;
        }
    }
}