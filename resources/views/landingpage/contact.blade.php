@extends('template.landingpage')

@section('title', 'Contact')

@section('hero')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contacts</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-3">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">Instagram</h5>
                            <p><i class="fab fa-instagram text-primary me-2"></i><a href="{{ $sosmed->instagram }}">Kawa
                                    Ngopi</a></p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">WhatsApp</h5>
                            <p><i class="fab fa-whatsapp text-primary me-2"></i><a
                                    href="https://wa.me/{{ $sosmed->whatsapp }}">Kawa Ngopi</a></p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">TikTok</h5>
                            <p><i class="fab fa-music text-primary me-2"></i><a href="{{ $sosmed->tiktok }}">Kawa Ngopi</a>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h5 class="section-title ff-secondary fw-normal text-start text-primary">Facebook</h5>
                            <p><i class="fab fa-facebook text-primary me-2"></i><a href="{{ $sosmed->facebook }}">Kawa
                                    Ngopi</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.2902468855587!2d114.7613779!3d-3.8080387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6f12c7d150aa7%3A0x2915b183f236dbb8!2sKawa%20Ngopi!5e0!3m2!1sen!2sid!4v1603794290143!5m2!1sen!2sid"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>


            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
