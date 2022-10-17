@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">


            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Pemesanan Layanan</h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Pemesanan Layanan</a>
                            </li>
                        </ol>
                    </nav>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Pemesanan Layanan
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($pembookingans as $pembookingan)
                                        <tr>
                                            <td><?php echo $nomor++; ?> </td>
                                            <td>{{$pembookingan->id_pembookinganlayanan}}</td>
                                            <td>{{$pembookingan->name}}</td>
                                            <td>@currency($pembookingan->total_pembayaran)</td>
                                            <td>
                                                @if($pembookingan->status == 'Verifikasi')
                                                <span class="badge badge-warning">{{$pembookingan->status}}</span>
                                                @elseif($pembookingan->status == 'Diterima')
                                                <span class="badge badge-success">{{$pembookingan->status}}</span>
                                                @elseif($pembookingan->status == 'Ditolak')
                                                <span class="badge badge-danger">{{$pembookingan->status}}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-icon-split">
                                                    <a href="" type="submit" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pembookingan->id_pembookinganlayanan}}">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-pen"></i>
                                                        </span>
                                                        <span class="text">Konfirmasi</span>
                                                    </a></button>
                                                <button class="btn btn-info btn-icon-split">
                                                    <a href="pembookingandetail/{{$pembookingan->id_pembookinganlayanan}}" class="btn btn-info btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-info"></i>
                                                        </span>
                                                        <span class="text">Detail</span>
                                                    </a>
                                                </button>
                                                <button class="btn btn-danger btn-icon-split">
                                                    <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$pembookingan->id_pembookinganlayanan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Status </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('daftarpembookingan.update',$pembookingan->id_pembookinganlayanan)}}" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <label for="exampleFormControlInput1">Status</label>
                                                            @if($pembookingan->status == 'Diterima')
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="diterima" value=" Diterima" checked>
                                                                <label class="form-check-label" for="diterima">
                                                                    Diterima
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="ditolak" value="Ditolak">
                                                                <label class="form-check-label" for="diterima">
                                                                    Ditolak
                                                                </label>
                                                            </div>
                                                            @elseif($pembookingan->status == 'Ditolak')
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="diterima" value=" Diterima">
                                                                <label class="form-check-label" for="diterima">
                                                                    Diterima
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="ditolak" value="Ditolak" checked>
                                                                <label class="form-check-label" for="diterima">
                                                                    Ditolak
                                                                </label>
                                                            </div>
                                                            @else
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="diterima" value=" Diterima">
                                                                <label class="form-check-label" for="diterima">
                                                                    Diterima
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="status" id="ditolak" value="Ditolak">
                                                                <label class="form-check-label" for="diterima">
                                                                    Ditolak
                                                                </label>
                                                            </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <label for="keterangan">Keterangan</label>
                                                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{$pembookingan->keterangan}}</textarea>
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

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin menghapusnya?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="daftarpembokinganlayanan/delete/{{$pembookingan->id_pembookinganlayanan}}" class="btn btn-danger btn-icon-split">
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
    @include('admin.footer')