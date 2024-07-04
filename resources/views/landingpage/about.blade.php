@extends('template.landingpage')

@section('title', 'About Us')

@section('hero')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">About Us</h5>
            <h1 class="mb-5">Kawa Ngopi</h1>
        </div>
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-4"><b>Visi:</b></p>
                                <p class="mb-4">{{ $about->visi }}</p>
                                <p class="mb-4"><b>Misi:</b></p>
                                <p class="mb-4">{{ $about->misi }}</p>
                                <p class="mb-4"><b>Sejarah:</b></p>
                                <p class="mb-4">{{ $about->sejarah }}</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <div class="col-6 text-start">
                                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                                            src="{{ asset('assets/img/p7.jpg') }}">
                                    </div>
                                    <div class="col-6 text-start">
                                        <img class="img-fluid rounded w-75 wowlok4=] zoomIn" data-wow-delay="0.3s"
                                            src="{{ asset('assets/img/p8.jpg') }}" style="margin-top: 25%;">
                                    </div>
                                    <div class="col-6 text-end">
                                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                                            src="{{ asset('assets/img/p10.jpg') }}">
                                    </div>
                                    <div class="col-6 text-end">
                                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"
                                            src="{{ asset('assets/img/p12.jpg') }}">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
