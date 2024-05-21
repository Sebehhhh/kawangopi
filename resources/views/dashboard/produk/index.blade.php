@extends('template.dashboard')

@section('title', 'Product')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Products /</span> ...</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('dashboard.produk') }}" method="GET" id="filterForm">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama..." value="{{ request('nama') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori">
                                    <option value="">~ Pilih Kategori ~</option>
                                    @foreach ($categories as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <select class="form-select" id="stok" name="stok">
                                    <option value="">~ Pilih Status Stok ~</option>
                                    <option value="good" {{ request('stok') == 'good' ? 'selected' : '' }}>Good</option>
                                    <option value="warning" {{ request('stok') == 'warning' ? 'selected' : '' }}>Warning
                                    </option>
                                    <option value="danger" {{ request('stok') == 'danger' ? 'selected' : '' }}>Danger
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2" onclick="resetFilterProduk()"><i
                                        class="mdi mdi-refresh"></i><span> Reset</span></button>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-filter-variant"></i><span>
                                        Filter</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
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
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Stok</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($produks as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->kategori->nama }}</td>
                                <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                                <td>
                                    @if ($product->gambar)
                                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="Product Image"
                                            style="width: 50px; height: 50px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <b>{{ $product->stok }}</b>
                                    @if ($product->stok > 20)
                                        <span class="badge bg-success">Good</span>
                                    @elseif ($product->stok >= 10)
                                        <span class="badge bg-warning">Warning</span>
                                    @else
                                        <span class="badge bg-danger">Danger</span>
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
                                                data-bs-target="#editProductModal" data-id="{{ $product->id }}"
                                                data-kategori="{{ $product->kategori_produk_id }}"
                                                data-nama="{{ $product->nama }}" data-harga="{{ $product->harga }}"
                                                data-stok="{{ $product->stok }}"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                onclick="confirmDeleteProduct(event, '{{ route('dashboard.produk.destroy', $product->id) }}')"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation" class="mt-3 mx-3">
                    {{ $produks->links('pagination::bootstrap-5') }}
                </nav>

            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>


    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit-kategori_produk_id" class="form-label">Kategori <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="edit-kategori_produk_id" name="kategori_produk_id" required>
                                <option value="">~ Select Category Product ~</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama Produk..." required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga Produk..." required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                placeholder="Masukkan Stok Produk..." required>
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

    <!-- Modal Edit Product -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.produk.update') }}" method="POST" id="editProductForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-product-id" name="id">
                        <div class="mb-3">
                            <label for="edit-kategori-produk" class="form-label">Kategori Produk <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="edit-kategori-produk" name="kategori_produk_id" required>
                                <!-- Assuming you have a categories variable passed from the controller -->
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-nama-produk" class="form-label">Nama Produk <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit-nama-produk" name="nama"
                                placeholder="Masukkan Nama Produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-harga" class="form-label">Harga <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="edit-harga" name="harga"
                                placeholder="Masukkan Harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-stok" class="form-label">Stok <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="edit-stok" name="stok"
                                placeholder="Masukkan Stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="edit-gambar" name="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Hapus Produk -->
    <form id="delete-product-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection
