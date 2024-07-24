@extends('template.dashboard')

@section('title', 'Galeri')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Galeri /</span> ...</h4>

        <!-- Error Handling -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Your existing galeri list or table here -->
        @if ($galeriCount < 8)
            <!-- Create Galeri Button -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGaleriModal">
                    Add
                </button>
            </div>
        @endif

        <!-- Galeri Table -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($galeriItems as $galeri)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($galeri->gambar)
                                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Galeri Image"
                                            style="width: 50px; height: 50px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#editGaleriModal" data-id="{{ $galeri->id }}"
                                                data-gambar="{{ $galeri->gambar }}"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                onclick="confirmDeleteGaleri(event, '{{ route('dashboard.galeri.destroy', $galeri->id) }}')"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <nav aria-label="Page navigation" class="mt-3 mx-3">
                    {{ $galeriItems->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
        <!--/ Galeri Table -->
    </div>

    <!-- Modal Add Galeri -->
    <div class="modal fade" id="addGaleriModal" tabindex="-1" aria-labelledby="addGaleriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGaleriModalLabel">Add Galeri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Galeri -->
    <div class="modal fade" id="editGaleriModal" tabindex="-1" aria-labelledby="editGaleriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.galeri.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editGaleriModalLabel">Edit Galeri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <input type="hidden" id="edit-galeri-id" name="id">
                        <div class="mb-3">
                            <label for="edit-gambar" class="form-label">Image</label>
                            <input type="file" class="form-control" id="edit-gambar" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Form Delete Galeri -->
    <form id="delete-galeri-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection
