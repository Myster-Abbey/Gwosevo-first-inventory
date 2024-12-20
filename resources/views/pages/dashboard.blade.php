@extends('layouts.auth')

@section('pageTitle', 'Dashboard')

@section('content')
    <div class="page-content">
        <div class="row pb-3">
            <div style="background-image: url('{{ asset('assets/images/gwosevo-1.webp') }}');
                        background-color: #f0f0f0;
                        background-size: cover;
                        background-position: center center;
                        background-repeat: no-repeat;
                        height: 20rem;
                        width: 100%;
                        object-fit: cover;">
            </div>
        </div>

        <div class="container">
            <div class="row g-2"> <!-- Use Bootstrap's g-2 class for small gaps -->
                <div class="col-md-6"> <!-- Responsive column -->
                    <div class="card text-white bg-primary" style="border-radius: 12px; overflow: hidden;">
                        <img src="{{ asset('assets/images/ads.png') }}" class="card-img-top" alt="Card image" style="width: 100px; height: 100px; object-fit: cover; border-top-left-radius: 12px;">
                        <div class="card-body" style="padding-top: 120px;">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-light">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6"> <!-- Responsive column -->
                    <div class="card text-white bg-primary" style="border-radius: 12px; overflow: hidden;">
                        <img src="{{ asset('assets/images/ads.png') }}" class="card-img-top" alt="Card image" style="width: 100px; height: 100px; object-fit: cover; border-top-left-radius: 12px;">
                        <div class="card-body" style="padding-top: 120px;">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-light">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="row">
            <div class="col-lg-12">
                <div class="card"></div>
            </div>
        </div>
    </div>

    <!-- jQuery and DataTables scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
