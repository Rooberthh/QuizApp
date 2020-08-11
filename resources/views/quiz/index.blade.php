@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Quiz</h2>
        <form method="POST" action="{{ route('quiz.store') }}">
            {{ csrf_field() }}
            <table class="table">
                <tbody>
                    @foreach($questions as $question)
                        @if(is_array(old($question->title)))
                            <tr class="bg-success">
                        @elseif($errors->first())
                            <tr class="bg-danger">
                        @else
                            <tr>
                        @endif
                            <td>{{ $question->title }}</td>
                            @foreach($question->answers as $answer)
                                <td>
                                    <label for="">
                                        {{ $answer->title }}
                                        @if((is_array(old($question->title)) && in_array($answer->id, old($question->title))) ||
                                            (!is_null(session('answers')) && collect(session('answers'))->has($question->title) &&
                                            in_array($answer->id, session('answers')[$question->title]))
                                        )
                                            <input type="checkbox" checked name="{{$question->title}}[]" value="{{ $answer->id }}"/>
                                        @else
                                            <input type="checkbox" name="{{$question->title}}[]" value="{{ $answer->id }}"/>
                                        @endif
                                    </label>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if((int)session('page') > 1)
                <a href="?page={{ (int)session('page') - 1 }}">Previous</a>
            @endif
            <button class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
@endsection
