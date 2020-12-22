<?php

namespace App\Types;

class Item extends Entity implements IEntity {
    public $id = 0;
    public $product_id = 0;
    public $price = 0;

    public function validate() {
        return (
            !empty($this->product_id) &&
            !empty($this->price)
        );
    }
}
