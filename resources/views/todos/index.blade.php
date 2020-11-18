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
    <div class="row" style="margin-top: 10px;">
        <x-alert />
        <table class="table table-hover" id="todosIndex">
            <thead>
                <th>Order No.</th>
                <th>Buyer Name</th>
                <th style="text-align:right;">Price ( <i class="fa fa-rupee"></i> )</th>
                <th>Tracking No.</th>
                <th>Order Dt.</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td><span onclick="pasteMe($(this).text())">{{ $todo->order_no }}</span></td>
                    @foreach($repeatCustomer as $repeat)
                        @if($repeat->buyer_phone == $todo->buyer_phone)
                            <td><span onclick="pasteMe($(this).text())">{{ $todo->buyer_name }}</span><span style="color: forestgreen;"> (Repeat)</span></td>
                        @else
                            <td><span onclick="pasteMe($(this).text())">{{ $todo->buyer_name }}</span></td>
                        @endif
                    @endforeach

                    <td style="text-align:right;"> @if (!empty($todo->refund_applied)) <span style="color: red;">-{{ number_format($todo->price, 2) }}</span> @else <span style="color: forestgreen;">{{ number_format($todo->price, 2) }}</span> @endif</td>
                    <td>{{ $todo->consign_no }}</td>
                    <td>{{ date("d/m/Y", strtotime($todo->order_date)) }}</td>
                    <td>@if (!empty($todo->refund_applied)) <span style="color: red; font-size: 0.8em; font-weight: bold">Returned</span> @else <span style="color: forestgreen; font-size: 0.8em; font-weight: bold">Accepted</span> @endif</td>
                    <td><a href="{{ route('todo.view', $todo->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> | <a href="{{ route('todo.edit', $todo->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <i class="fa fa-trash cursor-pointer" style="color: orangered;" aria-hidden="true" onclick="if (confirm('Are you really want to delete?')) { document.getElementById('form-delete-{{ $todo->id }}').submit() }"></i></td>

                    <form method="post" style="display: none;" action="{{ route('todo.delete', $todo->id) }}" id="{{ 'form-delete-' . $todo->id }}">
                        @csrf
                        @method('delete')
                    </form>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">{!! $todos->appends($_GET)->links() !!}</div>
    </div>
@endsection



