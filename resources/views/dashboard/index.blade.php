@extends('template.dashboard')

@section('title', 'Dashboard')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> ...</h4>

        <!-- Examples -->
        <div class="row mb-5">

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    {{-- <img class="card-img-top" src="{{ asset('assets/dashboard/assets/img/elements/2.jpg') }}"
                        alt="Card image cap" /> --}}
                    <div class="card-body">
                        <h5 class="card-title">Our Community</h5>
                        <p class="card-text">
                            Join our vibrant community and be a part of something great!
                        </p>
                        <p class="card-text" style="font-size: 24px; font-weight: bold;">Total Members: {{ $userCount }}
                        </p>
                        <a href="{{ route('dashboard.user') }}" class="btn btn-outline-primary">Explore</a>
                    </div>
                </div>
            </div>


        </div>
        <!-- Examples -->
    </div>
@endsection
