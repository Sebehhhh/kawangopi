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
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-4"><b>Sejarah:</b></p>
                                <p class="mb-4">{{ $about->sejarah }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
