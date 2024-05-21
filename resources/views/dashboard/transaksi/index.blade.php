@extends('template.dashboard')

@section('title', 'Transaction')

@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Transactions /</span> ...</h4>

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
                <form action="{{ route('dashboard.transaksi') }}" method="GET" id="filterForm">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Tanggal Awal</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ $start_date }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ $end_date }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <button type="button" class="btn btn-secondary mt-4" onclick="resetFilter()"><i
                                        class="mdi mdi-refresh"></i><span>Reset</span></button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary mt-4"><i
                                        class="mdi mdi-filter-variant"></i><span>Filter</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTransaksiModal">
                <i class="mdi mdi-database-plus"></i>Add
            </button>
            <a href="{{ route('dashboard.transaksi.export') }}" class="btn btn-success ms-2"><i
                    class="mdi mdi-file-excel"></i> Export to Excel</a>
        </div>

        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->produk->nama }}</td>
                                <td>{{ $transaksi->quantity }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->timezone('Asia/Makassar')->format('d-m-Y H:i') }}
                                </td>
                                {{-- <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#editTransaksiModal" data-id="{{ $transaksi->id }}"
                                                data-produk="{{ $transaksi->product_id }}"
                                                data-quantity="{{ $transaksi->quantity }}"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                onclick="confirmDeleteTransaksi(event, '{{ route('dashboard.transaksi.destroy', $transaksi->id) }}')"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation" class="mt-3 mx-3">
                    {{ $transaksis->links('pagination::bootstrap-5') }}
                </nav>

            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>

    <!-- Modal Tambah Transaksi -->
    <div class="modal fade" id="tambahTransaksiModal" tabindex="-1" aria-labelledby="tambahTransaksiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahTransaksiModalLabel">Tambah Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="produk_id" class="form-label">Produk <span class="text-danger">*</span></label>
                            <select class="form-select" id="produk_id" name="produk_id" required>
                                <option value="">~ Select Product ~</option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Masukkan Quantity..." required>
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

    <!-- Modal Edit Transaksi -->
    {{-- <div class="modal fade" id="editTransaksiModal" tabindex="-1" aria-labelledby="editTransaksiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTransaksiModalLabel">Edit Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.transaksi.update') }}" method="POST" id="editTransaksiForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-transaksi-id" name="id">
                        <div class="mb-3">
                            <label for="edit-produk-id" class="form-label">Produk <span class="text-danger">*</span></label>
                            <select class="form-select" id="edit-produk-id" name="produk_id" required>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-quantity" class="form-label">Quantity <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="edit-quantity" name="quantity"
                                placeholder="Masukkan Quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Form Hapus Transaksi -->
    {{-- <form id="delete-transaksi-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form> --}}
@endsection
