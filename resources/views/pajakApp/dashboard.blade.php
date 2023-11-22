@extends('layouts.master')

@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center mb-1">Well done :)</h6>
                <p class="mb-0">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Jumlah Denda Setiap Pembayar</h5>
                        <div class="card-datatable table-responsive">
                            <table id="example" class="table border-top" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nomor Polisi</th>
                                        <th>Pembayar</th>
                                        <th>Total Denda</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('template/sneat/assets/img/icons/unicons/paypal.png')}}" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Denda Terbanyak Kedua</span>
                                <h3 class="card-title text-nowrap mb-2">{{$data['denda_terbanyak_kedua']->no_polisi}}</h3>
                                <span class="text-muted">{{$data['denda_terbanyak_kedua']->pembayar}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('template/sneat/assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded"/>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Pamilik Kendaraan Terbanyak</span>
                                <h3 class="card-title mb-2">{{$data['pemilik_kendaraan_terbanyak']->pembayar}}</h3>
                                <span class="text-muted">{{$data['pemilik_kendaraan_terbanyak']->total}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('template/sneat/assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Jenis Pajak Terbanyak Dibayar</span>
                                <h3 class="card-title text-nowrap mb-1">{{$data['jenis_pajak_terbanyak_dibayar']->jenis_kendaraan}}</h3>
                                <span class="text-muted">{{$data['pegawai_paling_jarang_melayani']->jumlah_pelayanan}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('template/sneat/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt1" -bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Pegawai Paling Jarang Melayani</span>
                                <h3 class="card-title text-nowrap mb-1">{{$data['pegawai_paling_jarang_melayani']->nama_pegawai}}</h3>
                                <span class="text-muted">{{$data['jenis_pajak_terbanyak_dibayar']->jumlah_kendaraan}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('template/sneat/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt1" -bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Jumlah Pajak dari Kategori</span>
                                <h3 class="card-title text-nowrap mb-1">{{$data['jumlah_pajak_dari_kategori']->sum_pajak}}</h3>
                                <span class="text-muted">{{$data['jumlah_pajak_dari_kategori']->jenis_kendaraan}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                            <div id="totalRevenueChart" class="px-2"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">2022</button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="growthChart"></div>
                            <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>2022</small>
                                        <h6 class="mb-0">$32.5k</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>2021</small>
                                        <h6 class="mb-0">$41.2k</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Reports</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{asset('template/sneat/assets/img/icons/unicons/paypal.png')}}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Report</small>
                                        <h6 class="mb-0">Denda Terbanyak Kedua</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$data['denda_terbanyak_kedua']->no_polisi}} | </h6>
                                        <span class="text-muted">{{$data['denda_terbanyak_kedua']->pembayar}}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{asset('template/sneat/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Report</small>
                                        <h6 class="mb-0">Pamilik Kendaraan Terbanyak</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$data['pemilik_kendaraan_terbanyak']->total}} | </h6>
                                        <span class="text-muted">{{$data['pemilik_kendaraan_terbanyak']->pembayar}}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{asset('template/sneat/assets/img/icons/unicons/chart.png')}}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Report</small>
                                        <h6 class="mb-0">Jenis Pajak Terbanyak Dibayar</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$data['jenis_pajak_terbanyak_dibayar']->jenis_kendaraan}} | </h6>
                                        <span class="text-muted">{{$data['jenis_pajak_terbanyak_dibayar']->jumlah_kendaraan}}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{asset('template/sneat/assets/img/icons/unicons/cc-success.png')}}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Report</small>
                                        <h6 class="mb-0">Pegawai Paling Jarang Melayani</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$data['pegawai_paling_jarang_melayani']->nama_pegawai}} | </h6>
                                        <span class="text-muted">{{$data['pegawai_paling_jarang_melayani']->jumlah_pelayanan}}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{asset('template/sneat/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Report</small>
                                        <h6 class="mb-0">Jumlah Pajak dari Kategori </h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$data['jumlah_pajak_dari_kategori']->sum_pajak}} | </h6>
                                        <span class="text-muted">{{$data['jumlah_pajak_dari_kategori']->jenis_kendaraan}}</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{asset('template/sneat/assets/img/icons/unicons/cc-warning.png')}}" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Mastercard</small>
                                        <h6 class="mb-0">Ordered Food</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">-92.45</h6>
                                        <span class="text-muted">USD</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('my-script')
        <script>
            // Show table with data
            var table_pegawai = $('#example').DataTable({
                // dom: '<lf<t>ip>',
                ajax: {
                    url:'{{url("/dashboard-pajak/get-data-pembayar")}}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'no_polisi' },
                    { data: 'pembayar' },
                    { data: 'jumlah_denda' },
                ],
            });
        </script>
    @endsection
@endsection
