@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Produk</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Produk</a>
                            </li>
                        </ol>
                    </nav>
                    <div class=" py-3">
                        <div><a href="/daftarproduk/tambah" class="btn btn-success btn-icon-split" style="text-align: right;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a></div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Produk
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <th>Kuantitas</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($daftarproduks as $daftarproduk)
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td>{{$daftarproduk->nama}}</td>
                                            <td>@currency($daftarproduk->harga)</td>
                                            <td>{{$daftarproduk->kategori}}</td>
                                            <td>{{$daftarproduk->stok}}</td>
                                            <td><img src="{{url('gbr_produk/'.$daftarproduk->gambar)}}" class="py-1 width=" 50" height="100" alt=""></td>
                                            <td>
                                                <a href="/daftarproduk/edit/{{$daftarproduk->id_produk}}" class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-pen"></i>
                                                    </span>
                                                    <span class="text">Ubah</span>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#exampleModal{{$daftarproduk->id_produk}}">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$daftarproduk->id_produk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin menghapusnya?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="daftarproduk/delete/{{$daftarproduk->id_produk}}" class="btn btn-danger btn-icon-split">
                                                            <span class="text">Hapus</span>
                                                        </a>
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
    <!-- End of Main Content -->
    @include('admin.footer')