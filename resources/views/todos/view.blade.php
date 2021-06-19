@extends('todos.layout')

@section('content')

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Customer Information</h6>
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">{{ $todo->buyer_name }}</strong>
            </p>
        </div>
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Address</strong>
                {{ $todo->buyer_address }} @empty ($todo->buyer_address) Address N/A @endempty
            </p>
        </div>
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">Phone</strong>
                {{ $todo->buyer_phone }} @empty ($todo->buyer_phone) Phone N/A @endempty
            </p>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Item Information</h6>
        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Order No.</strong>
                </div>
                <span class="d-block">{{ $todo->order_no }} @empty ($todo->order_no) Order No. N/A @endempty </span>
            </div>
        </div>

        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Item(s)</strong>
                </div>
                <span class="d-block">
                    <ul>
                        @foreach($allItems as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </span>
            </div>
        </div>

        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Price</strong>
                </div>
                <span class="d-block"> <i class="fa fa-rupee"></i>{{ number_format($todo->price, 2) }}/- @empty ($todo->price) Price No. N/A @endempty</span>
            </div>
        </div>
        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Consignment No.</strong>
                </div>
                <span class="d-block">{{ $todo->consign_no }} @empty ($todo->consign_no) Consignment No. N/A @endempty</span>
            </div>
        </div>
        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Purchase Date</strong>
                </div>
                <span class="d-block">{{ date("d/m/Y", strtotime($todo->order_date)) }} @empty ($todo->order_date) Order Date N/A @endempty</span>
            </div>
        </div>

        @if (!empty($todo->refund_applied))
            <div class="media text-muted pt-3">
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <strong class="text-gray-dark">Refund Reason</strong>
                    </div>
                    <span class="d-block">
                        @php $reasons = explode(",", $todo->refund_reason) @endphp
                        @if (count($reasons) > 0) @foreach($reasons as $reason) <ul><li>{{ $reason }}</li></ul> @endforeach @endif
                        @empty ($todo->refund_reason) Reason N/A @endempty
                    </span>
                </div>
            </div>
        @endif
    </div>

@endsection
