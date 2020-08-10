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
                                        <input type="checkbox" {{ (is_array(old($question->title)) and in_array($answer->id, old($question->title))) ? ' checked' : '' }} name="{{$question->title}}[]" value="{{ $answer->id }}"/>
                                    </label>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
