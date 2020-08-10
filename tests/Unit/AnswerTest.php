<?php

namespace Tests\Unit;

use App\Answer;
use App\Question;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_is_a_answer()
    {
        $this->assertInstanceOf(Answer::class, create(Answer::class));
    }

    /** @test */
    function it_belongs_to_a_question()
    {
        $this->assertInstanceOf(Question::class, create(Answer::class)->question);
    }
}
