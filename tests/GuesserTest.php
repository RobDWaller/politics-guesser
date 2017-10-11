<?php

use App\Guesser\Guesser;
use App\Guesser\Data\Answers;
use App\Guesser\Data\DataInterface;
use App\Guesser\Model\KNearestNeighbour;
use Illuminate\Support\Collection;
use App\Guesser\Model\ModelInterface;
use Phpml\Classification\KNearestNeighbors;

class GuesserTest extends TestCase
{
    public function testGuesser()
    {
        $answers = factory(App\Answer::class, 3)->make();

        $dataAnswers = new Answers($answers);

        $mlModel = new KNearestNeighbour(new KNearestNeighbors);

        $guesser = new Guesser($dataAnswers, $mlModel);

        $this->assertInstanceOf(Guesser::class, $guesser);

        $this->assertInstanceOf(DataInterface::class, $guesser->getData());

        $this->assertInstanceOf(ModelInterface::class, $guesser->getModel());
    }

    public function testGuesserGetAnswer()
    {
        $answers = factory(App\Answer::class, 20)->make();

        $dataAnswers = new Answers($answers);

        $mlModel = new KNearestNeighbour(new KNearestNeighbors);

        $guesser = new Guesser($dataAnswers, $mlModel);

        $guesser->build();
        $guesser->train();

        $answers1 = factory(App\Answer::class, 1)->make();

        $dataAnswers1 = new Answers($answers1);

        $this->assertTrue(is_string($guesser->getAnswer($dataAnswers1->getData()[0])));

        $answers2 = factory(App\Answer::class, 1)->make();

        $dataAnswers2 = new Answers($answers2);

        $this->assertTrue(is_string($guesser->getAnswer($dataAnswers2->getData()[0])));
    }
}
