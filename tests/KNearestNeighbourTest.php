<?php

use App\Guesser\Model\KNearestNeighbour;
use App\Guesser\Model\ModelInterface;
use Phpml\Classification\KNearestNeighbors;
use App\Guesser\Data\Answers;

class KNearestNeighbourTest extends TestCase
{
    public function testKNearestNeighbour()
    {
        $model = new KNearestNeighbour(new KNearestNeighbors);

        $this->assertInstanceOf(KNearestNeighbour::class, $model);
        $this->assertInstanceOf(ModelInterface::class, $model);
    }

    public function testKNearestNeighbourGetAnswer()
    {
        $answers = factory(App\Answer::class, 3)->make();

        $dataAnswers = new Answers($answers);

        $model = new KNearestNeighbour(new KNearestNeighbors);

        $model->setData($dataAnswers->getData());

        $model->setLabels($dataAnswers->getLabels());

        $model->train();

        $answers1 = factory(App\Answer::class, 1)->make();

        $dataAnswers1 = new Answers($answers1);

        $this->assertTrue(is_string($model->getAnswer($dataAnswers1->getData()[0])));
    }
}
