@extends('todos.layout')
@push('style')
    <style type="text/css">
        .my-active span{
            background-color: #5cb85c !important;
            color: white !important;
            border-color: #5cb85c !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h1 class="text-2x1">All Deliveries</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6"><a href="{{ url('/todos/create') }}" class="btn btn-outline-success">Create</a></div>
        <div class="col-lg-6">
            <form method="post" action="{{ url('/todos/importexcel') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="csvfile"/>
                <input type="submit" name="uploadcsv" id="uploadcsv"/>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 form-group">
            <input type="text" name="search" id="search" class="form-control">
        </div>
    </div>
    <div class="row">
        <x-alert />
        <table class="table table-hover" id="todosIndex">
            <thead>
                <th>Order No.</th>
                <th>Buyer Name</th>
                <th style="text-align:right;">Price ( <i class="fa fa-rupee"></i> )</th>
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
                    <td style="text-align:right;"> @if (!empty($todo->refund_applied)) <span style="color: red;">-{{ number_format($todo->price, 2) }}</span> @else <span style="color: forestgreen;">{{ number_format($todo->price, 2) }}</span> @endif</td>
                    <td>{{ $todo->consign_no }}</td>
                    <td><a href="{{ url('/todos/'.$todo->id.'/edit') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td>@if (!empty($todo->refund_applied)) <span style="color: red; font-size: 0.8em; font-weight: bold">Returned</span> @else <span style="color: forestgreen; font-size: 0.8em; font-weight: bold">Accepted</span> @endif</td>
                    <td>
                        @if ($todo->completed)
                            <i class="fa fa-check" style="color: lightseagreen; cursor: pointer;"></i>
                        @else
                            <i class="fa fa-check" style="color: lightgrey; cursor: pointer;"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">{!! $todos->links() !!}</div>
    </div>
@endsection

