@extends('todos.layout')

@section('content')
    <h1 class="text-2x1">Edit this To-Do</h1>
    <x-alert />
    <form method="post" action="{{ route('todo.update', $todo->id) }}">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="exampleInputEmail1">Edit Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter something" value="{{ $todo->title }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
