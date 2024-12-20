@extends('layouts.auth')

@section('pageTitle', 'Whitelist')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <!-- <h4 class="mb-sm-0">Add Contact to Whitelist</h4> -->
                           <h4 class="mb-sm-0">Add content to USSD</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card" id="propertyList">
                <div class="container">

             <form action="{{ route('whitelist.store') }}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="campaign" class="form-label">Campaign</label>
                        <input type="text" class="form-control" id="campaign" name="campaign" required>
                        @error('campaign')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="shortcode" class="form-label">Shortcode</label>
                        <input type="text" class="form-control" id="shortcode" name="shortcode" required>
                    </div>
                    <div class="mb-3">
                        <label for="dbname" class="form-label">Database name</label>
                        <input type="text" class="form-control" id="dbname" name="dbname">
                         @error('campaign')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Add to USSD</button>
            </div>

             </form>
        </div>
    </div>
@endsection
