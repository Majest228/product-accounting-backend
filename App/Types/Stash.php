<?php

namespace App\Types;

class Stash extends Entity implements IEntity {
    public $id = 0;
    public $item_id = 0;
    public $count = '';

    public function validate() {
        return
            !empty($this->item_id) &&
            !empty($this->count);
    }
}