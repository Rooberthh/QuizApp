<?php

namespace Tests\Unit;

use App\Answer;
use App\Question;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function it_is_a_question ()
    {
        $this->assertInstanceOf("App\Question", create(Question::class));
    }
}
