<?php

use App\Guesser\Data\Answers;
use Illuminate\Support\Collection;

class AnswersTest extends TestCase
{
    public function testAnswers()
    {
        $answers = factory(App\Answer::class, 3)->make();

        $dataAnswers = new Answers($answers);

        $labels = $dataAnswers->getLabels();

        $this->assertTrue(is_array($labels));

        $data = $dataAnswers->getData();

        $this->assertTrue(is_array($data));
    }

    public function testAnswersLabels()
    {
        $answers = factory(App\Answer::class, 3)->make();

        $dataAnswers = new Answers($answers);

        $labels = $dataAnswers->getLabels();

        $this->assertTrue(isset($labels[0]));
        $this->assertFalse(is_array($labels[0]));

        $this->assertFalse(isset($labels[0][0]));
        $this->assertFalse(isset($labels[0][1]));
        $this->assertFalse(isset($labels[0][2]));
        $this->assertFalse(isset($labels[0][3]));
        $this->assertFalse(isset($labels[0][4]));
    }

    public function testAnswersData()
    {
        $answers = factory(App\Answer::class, 3)->make();

        $label = new Answers($answers);

        $data = $label->getData();

        $this->assertTrue(is_array($data[0]));

        $this->assertTrue(isset($data[0][0]));
        $this->assertTrue(isset($data[0][1]));
        $this->assertTrue(isset($data[0][2]));
        $this->assertTrue(isset($data[0][3]));
        $this->assertTrue(isset($data[0][4]));
    }

    public function testAnswersDataMatch()
    {
        $answers = factory(App\Answer::class, 5)->make();

        $dataAnswers = new Answers($answers);

        $labels = $dataAnswers->getLabels();

        $data = $dataAnswers->getData();

        $this->assertEquals($answers->first()->label, $labels[0]);
        $this->assertEquals($answers->first()->answer_one, $data[0][0]);
        $this->assertEquals($answers->first()->answer_five, $data[0][4]);

        $this->assertEquals($answers->get(2)->label, $labels[2]);
        $this->assertEquals($answers->get(2)->answer_two, $data[2][1]);
        $this->assertEquals($answers->get(2)->answer_four, $data[2][3]);

        $this->assertEquals($answers->last()->label, $labels[4]);
        $this->assertEquals($answers->last()->answer_one, $data[4][0]);
        $this->assertEquals($answers->last()->answer_three, $data[4][2]);
    }
}
