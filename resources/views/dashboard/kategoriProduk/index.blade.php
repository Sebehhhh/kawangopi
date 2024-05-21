@extends('template.dashboard')

@section('title', 'Kategori Produk')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Product Category /</span> ...</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategoriProdukModal">
                Add
            </button>
        </div>

        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#editKategoriProdukModal" data-id="{{ $item->id }}"
                                                data-nama="{{ $item->nama }}"><i class="mdi mdi-pencil-outline me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                onclick="confirmDeleteKategoriProduk(event, '{{ route('dashboard.kategoriProduk.destroy', $item->id) }}')"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>

    <!-- Modal Tambah Kategori Produk -->
    <div class="modal fade" id="tambahKategoriProdukModal" tabindex="-1" aria-labelledby="tambahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Add Product Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulir untuk menambahkan data baru -->
                    <!-- Contoh: -->
                    <form action="{{ route('dashboard.kategoriProduk.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label"> Product Category<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama-kategori-produk" name="nama"
                                placeholder="Masukkan Nama Kategori Produk..." required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Kategori Produk -->
    <div class="modal fade" id="editKategoriProdukModal" tabindex="-1" aria-labelledby="editKategoriProdukModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKategoriProdukModalLabel">Edit Kategori Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.kategoriProduk.update') }}" method="POST" id="editForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-id" name="id">
                        <div class="mb-3">
                            <label for="edit-nama" class="form-label">Nama Kategori<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit-nama-kategori-produk" name="nama"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Hapus Kategori Produk -->
    <form id="delete-kategori-produk-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection
