@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Pemesanan Kafe</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Pemesanan Kafe</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Pemesanan Kafe
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
                                            <th>Action</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanans as $pemesanan)
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td>{{$pemesanan->id_pemesanankafe}}</td>
                                            <td>{{$pemesanan->name}}</td>
                                            <td>@currency($pemesanan->total_pembayaran)</td>
                                            <td>
                                                <button class="btn btn-info btn-icon-split">
                                                    <a href="/daftarpemesanankafe/{{$pemesanan->id_pemesanankafe}}" class="btn btn-info btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-info"></i>
                                                        </span>
                                                        <span class="text">Detail</span>
                                                    </a>
                                                </button>

                                            </td>
                                        </tr>

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