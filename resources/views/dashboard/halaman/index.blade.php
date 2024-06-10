@extends('template.dashboard')

@section('title', 'About Us')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Homepage /</span> About Us</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('dashboard.about.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($about)
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $about->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="visi" name="visi" rows="3" required>{{ $about->visi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="misi" name="misi" rows="3" required>{{ $about->misi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Sejarah <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="sejarah" name="sejarah" rows="4" required>{{ $about->sejarah }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $about->alamat }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="telp" name="telp"
                                value="{{ $about->telp }}" required>
                        </div>
                    @endif

                    @if ($socialMedia)
                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                value="{{ $socialMedia->facebook }}">
                        </div>
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                value="{{ $socialMedia->instagram }}">
                        </div>
                        <div class="mb-3">
                            <label for="tiktok" class="form-label">TikTok</label>
                            <input type="text" class="form-control" id="tiktok" name="tiktok"
                                value="{{ $socialMedia->tiktok }}">
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                value="{{ $socialMedia->whatsapp }}">
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
