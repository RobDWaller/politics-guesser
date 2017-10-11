<?php

namespace App\Guesser;

use App\Guesser\Model\ModelInterface;
use App\Guesser\Data\DataInterface;
use Illuminate\Support\Collection;

class Guesser
{
    private $data;

    private $model;

    public function __construct(DataInterface $data, ModelInterface $model)
    {
        $this->data = $data;

        $this->model = $model;
    }

    public function getData(): DataInterface
    {
        return $this->data;
    }

    public function getModel(): ModelInterface
    {
        return $this->model;
    }

    public function build()
    {
        $this->model->setData($this->data->getData());

        $this->model->setLabels($this->data->getLabels());
    }

    public function train()
    {
        $this->model->train();
    }

    public function getAnswer(array $question): string
    {
        return $this->model->getAnswer($question);
    }
}
