<?php

namespace App\Guesser\Model;

use App\Guesser\Model\ModelInterface;
use Phpml\Classification\KNearestNeighbors;

class KNearestNeighbour implements ModelInterface
{
    private $model;

    private $data;

    private $labels;

    public function __construct(KNearestNeighbors $model)
    {
        $this->model = $model;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function setLabels(array $labels)
    {
        $this->labels = $labels;
    }

    public function train()
    {
        $this->model->train($this->data, $this->labels);
    }

    public function getAnswer(array $question): string
    {
        return $this->model->predict($question);
    }
}
