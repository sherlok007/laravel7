@extends('todos.layout')

@section('content')
    <h1 class="text-2x1">Edit this To-Do</h1>
    <x-alert />
    <form method="post" action="{{ route('todo.update', $todo->id) }}">        
        @csrf
        @method('patch')
        <input type="hidden" name="redirects_to" value="{{ URL::previous() }}" />
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h2>Update Order Details</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Update Details</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="buyer_name">Buyer Name</label>
                            <input type="text" class="form-control" name="buyer_name" id="buyer_name" value="{{ $todo->buyer_name }}" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="buyer_phone">Buyer Phone</label>
                            <input type="number" class="form-control" name="buyer_phone" id="buyer_phone" value="{{ $todo->buyer_phone }}">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price">Price ( <i class="fa fa-rupee"></i> )</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ $todo->price }}">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="buyer_address">Buyer Address</label>
                            <input type="text" class="form-control" name="buyer_address" id="buyer_address" value="{{ $todo->buyer_address }}">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="order_no">Order Number</label>
                            <input type="text" class="form-control" name="order_no" id="order_no" value="{{ $todo->order_no }}">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="product">Item Name</label>
                            <input type="text" class="form-control" name="product" id="product" value="{{ $todo->product }}">
                            <div class="invalid-feedback">
                                Please enter a the item name
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="buyer_state">State</label>
                            <select class="form-control" name="buyer_state" id="buyer_state">
                                <option>---Select State---</option>
                                @foreach ($states as $val)
                                    @php $selected = ''; @endphp
                                    @if($val->code == $todo->buyer_state )
                                        @php $selected = 'selected="selected"'; @endphp
                                    @endif
                                    <option value="{{ $val->code }}" {{ $selected }}>{{ $val->value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="consign_no">Consignment Number</label>
                            <input type="text" class="form-control" name="consign_no" id="consign_no" value="{{ $todo->consign_no }}">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="order_date">Order Date</label>
                            <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $todo->order_date }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="dispatch_date">Dispatch Date</label>
                            <input type="date" class="form-control" id="dispatch_date" name="dispatch_date" value="{{ $todo->dispatch_date }}">
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="refund_applied" id="refund_applied" @if (!empty($todo->refund_applied)) checked='checked' @endif>
                                <label class="custom-control-label" for="refund_applied">Refund Applied</label>
                            </div>
                        </div>
                        <div class="col-md-8 mb-8 form-inline">
                            <label class="col-sm-3 col-form-label" for="refund_reason">Return Reason</label>
                            <input type="text" class="form-control col-sm-9" name="refund_reason" id="refund_reason" value="{{ $todo->refund_reason }}">
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </form>

    <script>
        var url = window.location.pathname;

        // Check if refund has been applied and accordingly check the checkbox
        if (url.indexOf("edit") > -1) {
            if ($('#refund_applied').is(":checked") == true) {
                $('#refund_reason').prop("readonly", false);
            } else {
                $('#refund_reason').prop("readonly", true);
            }
        }

        $('#refund_applied').change(function() {
            if(this.checked) {
                $('#refund_reason').prop("readonly", false);
            } else {
                $('#refund_reason').prop("readonly", true);
            }
        })


    </script>
@endsection
