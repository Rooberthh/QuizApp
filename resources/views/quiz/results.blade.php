@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your got {{ $points }} points</h1>
        <div class="d-flex mb-5">
            <span class="badge badge-success">Correct</span>
            <span class="badge badge-danger mx-3">Incorrect</span>
            <span class="badge badge-warning">Should have been correct</span>
        </div>
        @foreach($allQuestions as $question)
            <div>
                <p>{{ $question->title }}</p>
            @foreach($question->answers as $answer)
                @if(in_array($answer->id, $userAnswersIds))
                <div class='bg-success p-2 my-2'>
                @elseif($answer->correct)
                <div class='bg-warning p-2 my-2'>
                @else
                <div class='bg-danger p-2 my-2'>
                @endif
                    <p>{{ $answer->title }}</p>
                </div>
            @endforeach
            </div>
        @endforeach
    </div>
    </div>
</div>

    {{ session()->flush() }}
@endsection
