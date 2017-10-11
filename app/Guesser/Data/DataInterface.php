<?php

namespace App\Guesser\Data;

interface DataInterface
{
    public function getData(): array;

    public function getLabels(): array;
}
