@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Pemesanan Produk</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Pemesanan</a>
                            </li>
                        </ol>
                    </nav>
                    <div class=" py-3">
                        <div><a href="/daftarpemesananadmin/tambah" class="btn btn-success btn-icon-split" style="text-align: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a></div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Pemesanan Produk
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Pemesanan</th>
                                            <th>Nama</th>
                                            <th>Total Pembayaran</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Action</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($daftarpemesanan as $daftarpemesanans)
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td>{{$daftarpemesanans->kode_transaksi}}</td>
                                            <td>{{$daftarpemesanans->name}}</td>
                                            <td>@currency($daftarpemesanans->total_pemesanan)</td>
                                            <td><img src="{{url('gbr_bukti_pembayaran/'.$daftarpemesanans->bukti_pembayaran)}}" width="100px" height="100px" alt="" data-bs-toggle="modal" data-bs-target="#myModals{{$daftarpemesanans->id_pemesanan}}"></td>
                                            <td><button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#exampleModal{{$daftarpemesanans->id_pemesanan}}">
                                                    <a class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                        <span class="text">Lihat</span>
                                                    </a></button></td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$daftarpemesanans->id_pemesanan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Lihat Pemesanan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Content Row -->
                                                        <div class="row text-center">
                                                            @if($daftarpemesanans->id_pemesananproduk != NULL)
                                                            <!-- Earnings (Monthly) Card Example -->
                                                            <div class=" col-md-4 text-center">
                                                                <div class="card border-bottom-primary shadow h-100 py-2">
                                                                    <div class="card-body">
                                                                        <div class="row no-gutters align-items-center">
                                                                            <div class="col mr-2">
                                                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                                    PRODUK</div>
                                                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <button type="button" class="btn btn-primary btn-icon-split" onclick="window.location.href='pemesanandetail/{{$daftarpemesanans->id_pemesananproduk}}'">
                                                                                    <a class="btn btn-primary btn-icon-split">
                                                                                        <span class="icon text-white-50">
                                                                                            <i class="fas fa-eye"></i>
                                                                                        </span>
                                                                                    </a>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <!-- Earnings (Monthly) Card Example -->
                                                            @if($daftarpemesanans->id_pembookinganlayanan != NULL)
                                                            <div class=" col-md-4 text-center">
                                                                <div class="card border-bottom-info shadow h-100 py-2">
                                                                    <div class="card-body">
                                                                        <div class="row no-gutters align-items-center">
                                                                            <div class="col mr-2">
                                                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">LAYANAN
                                                                                </div>
                                                                                <div class="row no-gutters align-items-center">
                                                                                    <div class="col-auto">
                                                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <button type="button" class="btn btn-info btn-icon-split" onclick="window.location.href='pembookingandetail/{{$daftarpemesanans->id_pembookinganlayanan}}'">
                                                                                    <a class="btn btn-info btn-icon-split">
                                                                                        <span class="icon text-white-50">
                                                                                            <i class="fas fa-eye"></i>
                                                                                        </span>
                                                                                    </a>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if($daftarpemesanans->id_pemesanankafe != NULL)
                                                            <div class=" col-md-4 text-center">
                                                                <div class="card border-bottom-warning shadow h-100 py-2">
                                                                    <div class="card-body">
                                                                        <div class="row no-gutters align-items-center">
                                                                            <div class="col mr-2">
                                                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">KAFE
                                                                                </div>
                                                                                <div class="row no-gutters align-items-center">
                                                                                    <div class="col-auto">
                                                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <button type="button" class="btn btn-warning btn-icon-split" onclick="window.location.href='/daftarpemesanankafe/{{$daftarpemesanans->id_pemesanankafe}}}'">
                                                                                    <a class="btn btn-warning btn-icon-split">
                                                                                        <span class="icon text-white-50">
                                                                                            <i class="fas fa-eye"></i>
                                                                                        </span>
                                                                                    </a>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Gambar -->
                                        <div id="myModals{{$daftarpemesanans->id_pemesanan}}" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="{{url('gbr_bukti_pembayaran/'.$daftarpemesanans->bukti_pembayaran)}}" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
        <!-- /.container-fluid -->

    </div>
    @include('admin.footer')