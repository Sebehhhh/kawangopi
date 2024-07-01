@extends('template.landingpage')

@section('title', 'Menu')

@section('hero')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Menus</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu</h5>
                <h1 class="mb-5">Most Popular Items</h1>
            </div>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    @foreach ($categories as $index => $products)
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $products->first()->category_id == 1 ? 'active' : '' }}"
                                data-bs-toggle="pill" href="#tab-{{ $products->first()->category_id }}">
                                <div class="ps-3">
                                    <small class="text-body">{{ $products->first()->category_name }}</small>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div class="tab-content">
                        @foreach ($categories as $index => $products)
                            <div id="tab-{{ $products->first()->category_id }}"
                                class="tab-pane fade {{ $products->first()->category_id == 1 ? 'show active' : '' }} p-0">
                                <div class="row g-4">
                                    @foreach ($products as $product)
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid rounded" src="{{ $product->gambar }}"
                                                    alt="" style="width: 80px;">
                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                        <span>{{ $product->nama }}</span>
                                                        <span class="text-primary">${{ $product->harga }}</span>
                                                    </h5>
                                                    {{-- <small class="fst-italic">{{ $product->description }}</small> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->

@endsection
