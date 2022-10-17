@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <main>
                <div class="container-fluid">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li> <li class="breadcrumb-item">
                                <a href={{url('/daftarpemesanankafe')}}>Daftar Pemesanan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Pemesanan Kafe Detail</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Daftar Pemesanan Detail
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kuantitas</th>
                                            <th>Total Harga</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanan as $pemesanan)
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td>{{$pemesanan->nama}}</td>
                                            <td>{{$pemesanan->kuantitas}}</td>
                                            <td>@currency($pemesanan->total_harga)</td>
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