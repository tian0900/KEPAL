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
                            </li>
                            <li class="breadcrumb-item">
                                <a href={{url('/daftarpembookingan')}}>Daftar Pemesanan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Pemesanan Detail</a>
                            </li>
                        </ol>
                    </nav>
                    
                    <div class="col-md-6">
                        @foreach($pembookingan as $pembookingans)
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nomor Telephone</label>
                                <input type="email" class="form-control" disabled id="exampleFormControlInput1" value="{{$pembookingans->nomor_telephone}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jadwal Servis</label>
                                <input type="email" class="form-control" disabled id="exampleFormControlInput1" value="{{ Carbon\Carbon::parse($pembookingans->tanggal_pembookingan)->format('d-m-Y') }} || {{$pembookingans->pukul}}"">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tipe Kendaraan</label>
                                <input type="email" class="form-control" disabled id="exampleFormControlInput1" value="{{$pembookingans->tipe_kendaraan}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keluhan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" disabled rows="3">{{$pembookingans->keluhan_service}}</textarea>
                            </div>
                        </form>
                        @endforeach
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Tabel Daftar Pemesanan Layanan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Total Harga</th>
                                        </tr><?php $nomor = 1; ?>
                                    </thead>
                                    <tbody>
                                        @foreach($daftarjoin as $daftarjoin)
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td>{{$daftarjoin->jenisservice}}</td>
                                            <td>@currency($daftarjoin->total_harga)</td>
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