<?php

namespace App\Types;

class Product extends Entity implements IEntity {
    public $id = 0;
    public $name = '';
    public $manufacturer_id = 0;
    public $category_id = 0;

    public function validate() {
        return (
            !empty($this->name) &&
            !empty($this->category_id) &&
            !empty($this->manufacturer_id)
        );
    }
}
