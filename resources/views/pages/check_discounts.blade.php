@extends('layouts.auth')

@section('pageTitle', 'Check Discounts')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Check Discounts</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card" id="propertyList">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Card Number</th>
                                    <th>OTP Code</th>
                                    <th>Discount Value</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($checkDiscounts as $checkDiscount)
                                    <tr>
                                        <td class="id">{{ $loop->iteration }}</td>
                                        <td class="card_code">{{ $checkDiscount->card_code }}</td>
                                        <td class="cvv_code">{{ $checkDiscount->cvv_code }}</td>
                                        <td class="discountValue">{{ $checkDiscount->discountValue }}</td>
                                        <td class="created_at">
                                            {{ \Carbon\Carbon::parse($checkDiscount->created_at)->format('Y-m-d H:i:s') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><!-- end table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
