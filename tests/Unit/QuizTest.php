<?php

namespace Tests\Unit;

use App\Quiz;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class QuizTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_is_a_quiz ()
    {
        $this->assertInstanceOf("App\Quiz", create(Quiz::class));
    }
}
