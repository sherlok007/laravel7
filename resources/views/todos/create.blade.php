@extends('todos.layout')

@section('content')
    <h1 class="text-2x1">What next you need to To-Do</h1>
    <x-alert />
    <form method="post" action="{{ url('/todos/create') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Create something</label>
            <input type="text" name="title" class="form-control" placeholder="Enter something">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
