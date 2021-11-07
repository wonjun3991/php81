<?php

namespace App;

class NewDto
{
    public function __construct(
        public readonly string $name,
        public readonly int $age,
    ){}
}
