<?php

namespace App\Models;

class Ingredient {
    public readonly string $name;
    public readonly string $quantity;

    public function __construct($name, $quantity) {
        $this->name = $name;
        $this->quantity = $quantity;
    }
}
