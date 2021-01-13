@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements disabled -->


            <div id="chartContainer" style="height: 370px; width: 100%;"></div>



            <div class="card card-warning">
                <div class="card-header">
                    <div class="form-check-inline">
                        <h3 class="card-title">Search Customer OR <a href="{{ url('/todos/create') }}" class="btn btn-sm btn-outline-success" style="margin-left: 5px;">Create</a> </h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-inline">
                                <label class="form-check-label" style="margin-right: 5px;">Search By</label>
                                <form id="customerIndex" class="form-inline my-2 my-lg-0" method="POST" action="{{ route('todo.search') }}">
                                    {{ csrf_field() }}
                                    <select class="form-control" name="searchOption" id="searchOption">
                                        <option value="1" @if(!empty($searchOption)) {{ $searchOption == "1" ? "selected" : "" }} @endif>Name</option>
                                        <option value="2" @if(!empty($searchOption)) {{ $searchOption == "2" ? "selected" : "" }} @endif>Order No</option>
                                        <option value="3" @if(!empty($searchOption)) {{ $searchOption == "3" ? "selected" : "" }} @endif>Phone</option>
                                    </select>

                                    <div class="input-group input-group-sm" style="margin-left: 10px;">
                                        <input type="text" class="form-control" id="query" name="query" value="{{ $searchquery ?? '' }}">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" onclick="validateSearch(); return false;">Go!</button>
                                        </span>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="start_date" style="margin-left: 10px;">Start Date</label>
                                    </div>
                                    <input type="date" class="form-control mr-sm-2" id="start_date" name="start_date" value="{{ $start_dt ?? '' }}" />

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="end_date" style="">End Date</label>
                                    </div>
                                    <input type="date" class="form-control mr-sm-2" id="end_date" name="end_date" value="{{ $end_dt ?? '' }}" />
                                </form>
                                <label class="form-check-label" for="upload_file" style="margin-left: 10px;">Upload File</label>
                                <div class="input-group input-group-sm" style="margin-left: 10px;">
                                    <form method="post" action="{{ url('/todos/importexcel') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="file" name="csvfile"/>
                                        <input type="submit" name="uploadcsv" id="uploadcsv"/>
                                    </form>
                                </div>
                                <button class="btn btn-outline-danger btn-sm" type="submit" onclick="searchReset(); return false;" style="margin-left: 10px;">Reset Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer Data</h3>
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                            {!! $todos->appends($_GET)->links() !!}
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <x-alert />
                    <table class="table table-hover" id="todosIndex">
                        <thead>
                        <th>Order No.</th>
                        <th>Buyer Name</th>
                        <th style="text-align:right;">Price ( <i class="fa fa-rupee-sign"></i> )</th>
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
                                <td><a href="{{ route('todo.view', $todo->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> | <a href="{{ route('todo.edit', $todo->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a> | <i class="fa fa-trash cursor-pointer" style="color: orangered;" aria-hidden="true" onclick="if (confirm('Are you really want to delete?')) { document.getElementById('form-delete-{{ $todo->id }}').submit() }"></i></td>

                                <form method="post" style="display: none;" action="{{ route('todo.delete', $todo->id) }}" id="{{ 'form-delete-' . $todo->id }}">
                                    @csrf
                                    @method('delete')
                                </form>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('js')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>

        var url = window.location.pathname;
        if (url.indexOf("edit") > -1) {
            if ($('#refund_applied').is(":checked") == true) {
                $('#refund_reason').prop("readonly", false);
            } else {
                $('#refund_reason').prop("readonly", true);
            }
        }

        // On clicking name or order no. automatically paste them in search textfield
        function pasteMe(val) {
            $('#query').val(val);
        }

        function validateSearch() {
            $error = true;

            if($("#query").val()=="") {
                $("#query").remove();
            }
            $('#customerIndex').submit();
        }

        // Reset page back to index
        function searchReset() {
            var url = {!! json_encode(url('/todos')) !!}
            if (url != '' || typeof (url) != "undefined") {
                window.location.href = url;
            }
        }

        // Chart function

        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: "Simple Column Chart with Index Labels"
                },
                axisY: {
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelFontSize: 16,
                    indexLabelPlacement: "outside",
                    dataPoints: [
                        { x: 10, y: 71 },
                        { x: 20, y: 55 },
                        { x: 30, y: 50 },
                        { x: 40, y: 65 },
                        { x: 50, y: 92, indexLabel: "\u2605 Highest" },
                        { x: 60, y: 68 },
                        { x: 70, y: 38 },
                        { x: 80, y: 71 },
                        { x: 90, y: 54 },
                        { x: 100, y: 60 },
                        { x: 110, y: 36 },
                        { x: 120, y: 49 },
                        { x: 130, y: 21, indexLabel: "\u2691 Lowest" }
                    ]
                }]
            });
            chart.render();

        }
    </script>
@stop
