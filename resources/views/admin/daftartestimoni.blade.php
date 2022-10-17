@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Ulasan</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Ulasan</a>
                            </li>
                        </ol>
                    </nav>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Ulasan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th  width="250px">Action</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($testimonis as $testimoni)
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td>{{$testimoni->judul}}</td>
                                            <td>{{$testimoni->pesan}}</td>
                                            <td class="text-center">
                                                <form action="{{route('daftartestimoni.update',$testimoni->id_testimoni)}}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class=" row">
                                                        <div class="col">
                                                            <select class="form-control" border="0px" required="required" name="status" aria-label="Default select example">
                                                                <option value="Tampilkan"{{$testimoni->status == "Tampilkan" ? 'selected' : ''}}>Tampilkan</option>
                                                                <option value="Tidak Ditampilkan"{{$testimoni->status == "Tidak Ditampilkan" ? 'selected' : ''}}>Tidak Ditampilkan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-success btn-icon-split">
                                                    <a href="" type="submit" class="btn btn-success btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Simpan</span>
                                                    </a></button>

                                                </form>
                                                <button class="btn btn-danger btn-icon-split">
                                                    <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#exampleModal{{$testimoni->id_testimoni}}">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$testimoni->id_testimoni}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="daftartestimoni/delete/{{$testimoni->id_testimoni}}" class="btn btn-danger btn-icon-split">
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