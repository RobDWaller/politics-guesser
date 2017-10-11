<?php

namespace App\Guesser\Model;

/**
 *
 */
interface ModelInterface
{
    public function setData(array $data);

    public function setLabels(array $labels);

    public function train();

    public function getAnswer(array $question): string;
}
