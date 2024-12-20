@extends('layouts.auth')

@section('pageTitle', 'Redemptions')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Transactions</h4>
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
                                    <th>ID</th>
                                    <th>Phone Number</th>
                                    <th>Network</th>
                                    <th>Amount(GHS)</th>
                                    <th>Payment Status</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td class="id">{{ $loop->iteration }}</td>
                                        <td class="phone_number">{{ $transaction->msisdn }}</td>
                                        <td class="network">{{ $transaction->network }}</td>

                                        <td class="amount">{{ $transaction->actual_amount }}</td>

                                        <td class="status">
                                            @if ($transaction->transaction_status == 'success')
                                                <button type="button" class="btn btn-sm btn-success">Success</button>
                                            @endif
                                            {{-- @if ($transaction->transaction_status == 'failed')
                                                <button type="button" class="btn btn-sm btn-danger">Failed</button>
                                            @endif
                                            @if ($transaction->transaction_status == 'pending')
                                                <button type="button" class="btn btn-sm btn-warning">Pending</button>
                                            @endif --}}
                                        </td>

                                        <td class="payment_date">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><!-- end table -->

                    </div>
                    <!--end row-->
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
