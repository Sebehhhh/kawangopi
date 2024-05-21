@extends('template.dashboard')

@section('title', 'Dashboard')

@section('content')

    <!-- Transactions -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Dashboard</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-primary rounded shadow">
                                    <i class="mdi mdi-account-outline mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Users</div>
                                <h5 class="mb-0">{{ number_format($userCount) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-success rounded shadow">
                                    <i class="mdi mdi-trending-up mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Categories Product</div>
                                <h5 class="mb-0">{{ number_format($kategoriCount) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-warning rounded shadow">
                                    <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Products</div>
                                <h5 class="mb-0">{{ number_format($produkCount) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-info rounded shadow">
                                    <i class="mdi mdi-currency-usd mdi-24px"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="small mb-1">Products Sold</div>
                                <h5 class="mb-0">{{ number_format($totalProdukTerjual) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weekly Overview Chart -->
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Graphic Transactions</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div id="transactionChart"></div>
                </div>
            </div>
        </div>
        <!--/ Weekly Overview Chart -->

        <!-- Top 3 Best Selling Products -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Top 3 Best Selling Products</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($topThreeProducts as $product)
                        <li class="list-group-item d-flex align-items-center">
                            <img src="{{ asset('storage/' . $product->produk->gambar) }}" alt="{{ $product->produk->nama }}"
                                class="img-thumbnail me-3" style="width: 50px; height: 50px;">
                            <div class="d-flex justify-content-between w-100">
                                <div>
                                    <h6 class="mb-0">#{{ $loop->iteration }} {{ $product->produk->nama }}</h6>
                                    <small>{{ $product->produk->deskripsi }}</small>
                                </div>
                                <span class="badge bg-primary">{{ $product->total_terjual }} Sold</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Top 3 Best Selling Products Per Category -->
        @foreach ($topThreePerCategory as $categoryId => $products)
            @php
                $category = $kategoris->find($categoryId);
            @endphp
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Top 3 Best Selling Products in {{ $category->nama }}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($products as $product)
                            <li class="list-group-item d-flex align-items-center">
                                <img src="{{ asset('storage/' . $product->produk->gambar) }}"
                                    alt="{{ $product->produk->nama }}" class="img-thumbnail me-3"
                                    style="width: 50px; height: 50px;">
                                <div class="d-flex justify-content-between w-100">
                                    <div>
                                        <h6 class="mb-0">#{{ $loop->iteration }} {{ $product->produk->nama }}</h6>
                                        <small>{{ $product->produk->deskripsi }}</small>
                                    </div>
                                    <span class="badge bg-primary">{{ $product->total_terjual }} Sold</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach


    </div>
    <!--/ Transactions -->


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chart;

            function fetchChartData(range) {
                $.ajax({
                    url: '{{ route('dashboard.chart') }}',
                    type: 'GET',
                    data: {
                        range: range
                    },
                    success: function(data) {
                        if (chart) {
                            chart.updateSeries([{
                                name: 'Transactions',
                                data: data
                            }]);
                        } else {
                            chart = new ApexCharts(document.querySelector("#transactionChart"), {
                                chart: {
                                    type: 'bar' // Ubah tipe chart menjadi 'bar'
                                },
                                series: [{
                                    name: 'Transactions',
                                    data: data
                                }],
                                xaxis: {
                                    type: 'datetime'
                                }
                            });
                            chart.render();
                        }
                    }
                });
            }

            // Default to 'all'
            fetchChartData('all');

            $('#timeRangeDropdown .dropdown-item').on('click', function() {
                var range = $(this).data('range');
                fetchChartData(range);
            });
        });
    </script>
@endsection
