@extends('template.landingpage')

@section('title', 'Homepage')

@section('hero')
    <div class="container-xxl py-5 bg-white hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam
                        dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita duo justo magna dolore erat amet</p>
                    <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A
                        Table</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="{{ asset('assets/img/circle.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <style>
        .rate {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rate input {
            display: none;
        }

        .rate label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            padding: 0 0.1rem;
        }

        .rate label:before {
            content: '★';
        }

        .rate input:checked~label {
            color: #ffc700;
        }

        .rate input:hover~label {
            color: #ffdd00;
        }

        .alert-fixed {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: auto;
            transition: opacity 0.5s ease-in-out;
        }
    </style>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        @if (session('success'))
            <div class="alert alert-success alert-fixed" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h5>Master Chefs</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                            <h5>Quality Food</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                            <h5>Online Order</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h5>24/7 Service</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
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
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                                src="{{ asset('assets/img/p17.jpg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wowlok4=] zoomIn" data-wow-delay="0.3s"
                                src="{{ asset('assets/img/p19.jpg') }}" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                                src="{{ asset('assets/img/p20.jpg') }}">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"
                                src="{{ asset('assets/img/p22.jpg') }}">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
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
                                                        <span class="text-primary">Rp.
                                                            {{ number_format($product->harga) }}</span>
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


    <!-- Reservation Start -->
    <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="video">
                    {{-- <button type="button" class="btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button> --}}
                </div>
            </div>
            <div class="col-md-6 bg-dark d-flex align-items-center">
                <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Review</h5>
                    <h1 class="text-white mb-4">Give Us Your Feedback</h1>
                    <form action="{{ route('landingpage.testimoni.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="name" name="nama" placeholder="Your Name"
                                        value="{{ old('nama') }}">
                                    <label for="name">Your Name</label>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Your Review" id="message"
                                        name="keterangan" style="height: 100px">{{ old('keterangan') }}</textarea>
                                    <label for="message">Your Review</label>
                                    @error('keterangan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <div id="rating" class="rate">
                                        <input type="radio" id="star5" name="rate" value="5"
                                            @if (old('rate') == 5) checked @endif />
                                        <label for="star5" title="text"></label>
                                        <input type="radio" id="star4" name="rate" value="4"
                                            @if (old('rate') == 4) checked @endif />
                                        <label for="star4" title="text"></label>
                                        <input type="radio" id="star3" name="rate" value="3"
                                            @if (old('rate') == 3) checked @endif />
                                        <label for="star3" title="text"></label>
                                        <input type="radio" id="star2" name="rate" value="2"
                                            @if (old('rate') == 2) checked @endif />
                                        <label for="star2" title="text"></label>
                                        <input type="radio" id="star1" name="rate" value="1"
                                            @if (old('rate') == 1) checked @endif />
                                        <label for="star1" title="text"></label>
                                    </div>
                                    <label for="rating" class="form-label">Rating</label>
                                    @error('rate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit Review</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Start -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach ($testies as $testimoni)
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>"{{ $testimoni->keterangan }}"</p>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h5 class="mb-1">By:{{ $testimoni->nama }}</h5>
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $testimoni->rate)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
