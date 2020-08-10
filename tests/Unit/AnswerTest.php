<?php

namespace Tests\Unit;

use App\Answer;
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
}
