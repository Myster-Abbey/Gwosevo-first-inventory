@extends('layouts.auth')

@section('pageTitle', 'Redemptions')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Retailer's Info</h4>
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
                                    <th>Full Name</th>
                                    <th>Company</th>
                                    <th>Product</th>
                                    <th>Package Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($registrars as $registrar)
                                    <tr>
                                        <td class="id">{{ $loop->iteration }}</td>
                                        <td class="msisdn">{{ $registrar->msisdn }}</td>
                                        <td class="network">{{ $registrar->network }}</td>
                                        <td class="full_name">{{ $registrar->full_name }}</td>
                                        <td class="company">{{ $registrar->company }}</td>
                                        <td class="product">{{ $registrar->product }}</td>
                                        <td class="package_type">{{ $registrar->package_type }}</td>
                                        <td class="created_at">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $registrar->created_at) }}
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
