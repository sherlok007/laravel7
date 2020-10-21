@extends('todos.layout')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h1 class="text-2x1">All Todos</h1>
        </div>
        <div class="col-lg-6">
            <a href="{{ url('/todos/create') }}" class="btn btn-outline-success">Create</a>
        </div>
    </div>
    <div class="row">

        <table class="table table-hover">
            <thead>
            <th>
                <x-alert />
            </th>
            </thead>
            <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td><a href="{{ url('/todos/'.$todo->id.'/edit') }}"><span class="fas fa-edit" /></a></td>
                    <td>
                        @if ($todo->completed)
                            <span class="fas fa-check" style="color: lightseagreen; cursor: pointer;" />
                        @else
                            <span class="fas fa-check" style="color: lightgrey; cursor: pointer;"  />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

