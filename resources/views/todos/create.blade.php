@extends('todos.layout')

@section('content')
    <x-alert />
    <form method="post" action="{{ url('/todos/create') }}">
        @csrf
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h2>Enter Order Details</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Enter Details</h4>
                <form class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="buyer_name">Buyer Name</label>
                            <input type="text" class="form-control" name="buyer_name" id="buyer_name"  value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="buyer_phone">Buyer Phone</label>
                            <input type="number" class="form-control" name="buyer_phone" id="buyer_phone"  value="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="buyer_address">Buyer Address</label>
                        <input type="text" class="form-control" name="buyer_address" id="buyer_address">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="order_no">Order Number</label>
                            <input type="text" class="form-control" name="order_no" id="order_no"  value="">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="consign_no">Consignment Number</label>
                            <input type="consign_no" class="form-control" name="consign_no" id="consign_no">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="order_date">Order Date</label>
                            <input type="date" class="form-control" id="order_date" name="order_date">
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="refund_applied" id="refund_applied" value="1">
                        <label class="custom-control-label" for="refund_applied">Refund Applied</label>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </form>
@endsection


