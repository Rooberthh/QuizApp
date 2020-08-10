@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Enter your details</h2>
        <form method="POST" action="{{ route('quizdetails.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control {{ ($errors->first('name')) ? "is-invalid" : "" }}" type="text" name="name" id="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                <p class='text-danger'> {{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input class="form-control {{ ($errors->first('email')) ? "is-invalid" : "" }}" type="text" name="email" id="email" value="{{ old('email') }}">
                @if($errors->email)
                    <p class='text-danger'> {{ $errors->first('email') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Show results</button>
        </form>
    </div>
@endsection
