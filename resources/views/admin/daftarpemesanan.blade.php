@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Pemesanan</h1>
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
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Pemesanan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width="100px">ID Pemesanan</th>
                                            <th width="100px">Nama</th>
                                            <!-- <th>Nama</th> -->
                                            <!-- <th>Tanggal Pemesanan</th> -->
                                            <th width="100px">Total Pembayaran</th>
                                            <th>Status</th>
                                            <th >Action</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanans as $pemesanan)
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td>{{$pemesanan->id_pemesananproduk}}</td>
                                            <td>{{$pemesanan->name}}</td>
                                            <!-- <td>{{$pemesanan->name}}</td> -->
                                            <!-- <td>{{ Carbon\Carbon::parse($pemesanan->tanggal_pemesanan)->format('d-m-Y') }}</td> -->
                                            <td>@currency($pemesanan->total_pembayaran)</td>
                                            <td>
                                                @if($pemesanan->status == 'Verifikasi')
                                                <span class="badge badge-warning">{{$pemesanan->status}}</span>
                                                @elseif($pemesanan->status == 'Proses')
                                                <span class="badge badge-info">{{$pemesanan->status}}</span>
                                                @elseif($pemesanan->status == 'Antar')
                                                <span class="badge badge-primary">{{$pemesanan->status}}</span>
                                                @elseif($pemesanan->status == 'Selesai')
                                                <span class="badge badge-success">{{$pemesanan->status}}</span>
                                                @elseif($pemesanan->status == 'Tolak')
                                                <span class="badge badge-danger">{{$pemesanan->status}}</span>
                                                @endif

                                            </td>
                                            <td >
                                                <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#exampleModalstatus{{$pemesanan->id_pemesananproduk}}">
                                                    <a class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Konfirmasi</span>
                                                    </a></button>


                                                <button class="btn btn-info btn-icon-split">
                                                    <a href="pemesanandetail/{{encrypt($pemesanan->id_pemesananproduk)}}" class="btn btn-info btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-info"></i>
                                                        </span>
                                                        <span class="text">Detail</span>
                                                    </a>
                                                </button>
                                                <button class="btn btn-danger btn-icon-split">
                                                    <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pemesanan->id_pemesananproduk}}">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$pemesanan->id_pemesananproduk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="daftarpemesanan/delete/{{$pemesanan->id_pemesananproduk}}" class="btn btn-danger btn-icon-split">
                                                            <span class="text">Hapus</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalstatus{{$pemesanan->id_pemesananproduk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Status </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('daftarpemesanan.update',$pemesanan->id_pemesananproduk)}}" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <label for="exampleFormControlInput1">Status</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="Verifikasi" value="Verifikasi" {{ $pemesanan->status == "Verifikasi" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="diterima">
                                                                    Verifikasi
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="Proses" value="Proses" {{ $pemesanan->status == "Proses" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="diterima">
                                                                    Proses
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="Antar" value="Antar" {{ $pemesanan->status == "Antar" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="diterima">
                                                                    Antar
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="Selesai" value="Selesai" {{ $pemesanan->status == "Selesai" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="diterima">
                                                                    Selesai
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="Tolak" value="Tolak" {{ $pemesanan->status == "Tolak" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="diterima">
                                                                    Tolak
                                                                </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keterangan">Keterangan</label>
                                                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{$pemesanan->keterangan}}</textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim</button>
                                                    </div>
                                                    </form>
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