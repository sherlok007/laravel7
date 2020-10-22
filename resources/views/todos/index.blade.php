@extends('todos.layout')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h1 class="text-2x1">All Deliveries</h1>
        </div>
        <div class="col-lg-4">
            <a href="{{ url('/todos/create') }}" class="btn btn-outline-success">Create</a>
        </div>
        <div class="col-lg-4">
            <form method="post" action="{{ url('/todos/importexcel') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-lg-4"><input type="file" name="csvfile"/></div>
                <div class="col-lg-4"><input type="submit" name="uploadcsv" id="uploadcsv"/></div>
            </form>
        </div>
    </div>
    <div class="row">
        <x-alert />
        <table class="table table-hover">
            <thead>
            <th>Order No.</th>
            <th>Buyer Name</th>
            <th>Phone</th>
            <th>Tracking No.</th>
            <th>Action</th>
            <th>Status</th>
            <th>Delivered</th>
            </thead>
            <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->order_no }}</td>
                    <td>{{ $todo->buyer_name }}</td>
                    <td>{{ $todo->buyer_phone }}</td>
                    <td>{{ $todo->consign_no }}</td>
                    <td><a href="{{ url('/todos/'.$todo->id.'/edit') }}"><span class="fas fa-edit" /></a></td>
                    <td>@if (!empty($todo->refund_applied)) <span style="color: red; font-size: 0.8em; font-weight: bold">Returned</span> @else <span style="color: forestgreen; font-size: 0.8em; font-weight: bold">Delivered</span> @endif</td>
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

