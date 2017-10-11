<?php

namespace App\Guesser\Data;
use Illuminate\Support\Collection;

class Answers implements DataInterface
{
    private $answers;

    public function __construct(Collection $answers)
    {
        $this->answers = $answers;
    }

    public function getLabels(): array
    {
        return $this->mapLabels($this->answers->toArray());
    }

    public function getData(): array
    {
        return $this->mapData($this->answers->toArray());
    }

    private function mapLabels(array $answers): array
    {
        return array_map(function($row){
            return $row['label'];
        }, $answers);
    }

    private function mapData(array $data): array
    {
        return array_map(function($row){
            return [
                $row['answer_one'],
                $row['answer_two'],
                $row['answer_three'],
                $row['answer_four'],
                $row['answer_five']
            ];
        }, $data);
    }
}
