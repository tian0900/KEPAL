@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <main>
                <div class="container-fluid">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href={{url('/daftargaleri')}}>Daftar Pemesanan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Tambah Pemesanan</a>
                            </li>
                        </ol>
                    </nav>
                    <!-- Basic Card Example -->
                    <div class="card shadow col-xl-8 col-md-6 mb-4">
                        <div class="card-header">
                            <h6 class=" font-weight-bold text-primary">Tambah Pemesanan</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('pemesananadmin.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <h4 class="d-flex justify-content-between align-items-center col-sm-2 mb-3">
                                        <span class="text-muted">Nama</span>
                                    </h4>
                                    <div class="col-sm-10">
                                        <select class="form-select form-control @error('name') is-invalid @enderror" multiple aria-label="multiple select example" id="name" name="name" placeholder="name" autofocus value="{{ old('name') }}">
                                            @foreach($user as $users)
                                            <option value="{{$users->user_id}}">{{$users->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 order-md-2 mb-4">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Metode Pembayaran</span>
                                        </h4>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="exampleRadios1" value="BCA" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <h6 class="my-0">BCA - No Rek 0000000001</h6>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="exampleRadios1" value="BNI">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <h6 class="my-0">BNI - No Rek 0000000001</h6>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="exampleRadios1" value="Mandiri">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <h6 class="my-0">Mandiri - No Rek 0000000001</h6>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="exampleRadios1" value="Bayar Langsung">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <h6 class="my-0">Bayar Langsung</h6>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 order-md-2 mb-4">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Bukti Pembayaran</span>
                                        </h4>
                                        <input type="file" class="form-control  @error('bukti_pembayaran') is-invalid @enderror" id="gambar" name="bukti_pembayaran" value="" onchange="previewImage()" autofocus value="{{ old('bukti_pembayaran') }}">
                                        @error('bukti_pembayaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <br>
                                        <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class=" col-md-4 text-center">
                                        <div class="card border-bottom-primary shadow">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase">
                                                            <h6>PRODUK</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="btn btn-primary btn-icon-split" onclick="window.location.href='/produk'">
                                                            <a class="btn btn-primary btn-icon-split">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-plus"></i>
                                                                </span>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4 text-center">
                                        <div class="card border-bottom-info shadow">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase">
                                                            <h6>layanan</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="btn btn-info btn-icon-split" onclick="window.location.href='/layanan'">
                                                            <a class="btn btn-info btn-icon-split">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-plus"></i>
                                                                </span>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4 text-center">
                                        <div class="card border-bottom-warning shadow">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase">
                                                            <h6>KAFE</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="btn btn-warning btn-icon-split" onclick="window.location.href='/cafe'">
                                                            <a class="btn btn-warning btn-icon-split">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-plus"></i>
                                                                </span>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(count($produk) != 0)
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                        Produk
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th width="220px">Jumlah</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr><?php $nomor = 1; ?>
                                                </thead>
                                                <tbody>
                                                    <!-----------------------------------PRODUK----------------------------------->
                                                    @foreach($produk as $produks)
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td>{{$produks->nama}}</td>
                                                        <td width="220px">
                                                            <div class="center row">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-danger btn-number" onclick="window.location.href='/checkout/kurang/{{$produks->id_keranjangproduk}}'">
                                                                            <span>-</span>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control input-number col-md-4 text-center" value="{{$produks->kuantitas}}" min="1">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-success btn-number" onclick="window.location.href='/checkout/tambah/{{$produks->id_keranjangproduk}}'">
                                                                            <span>+</span>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>@currency($produks->total)</td>
                                                        <td><a href="#" class="btn btn-danger btn-icon-split" onclick="window.location.href='/checkout/delete/{{$produks->id_keranjangproduk}}'">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text">Hapus</span>
                                                            </a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-----------------------------------LAYANAN----------------------------------->
                                @if(count($layanan) != 0)
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                        Layanan
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr><?php $nomor = 1; ?>
                                                </thead>
                                                <tbody>

                                                    @foreach($layanan as $layanans)
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td>{{$layanans->jenisservice}}</td>
                                                        <td>@currency($layanans->harga)</td>
                                                        <td><a href="#" class="btn btn-danger btn-icon-split" onclick="window.location.href='/checkout/deletelayanan/{{$layanans->id_keranjanglayanan}}'">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text">Hapus</span>
                                                            </a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                        <div class="form-group col-md-4">
                            <label for="nama">Tipe Kendaraan</label>
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipe_kendaraan" id="exampleRadios1" value="TIPE A" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    TIPE A
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipe_kendaraan" id="exampleRadios1" value="TIPE B">
                                <label class="form-check-label" for="exampleRadios1">
                                    TIPE B
                                </label>
                            </div>
                        </div>
                    </div>
                                @endif
                                <!-----------------------------------KAFE----------------------------------->
                                @if(count($kafe) != 0)
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                        Kafe
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th width="220px">Jumlah</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr><?php $nomor = 1; ?>
                                                </thead>
                                                <tbody>

                                                    @foreach($kafe as $kafes)
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td>{{$kafes->nama}}</td>
                                                        <td width="220px">
                                                            <div class="center row">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-danger btn-number" onclick="window.location.href='/kafe/kurang/{{$kafes->id_keranjangkafe}}'">
                                                                            <span>-</span>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control input-number col-md-4 text-center" value="{{$kafes->kuantitas}}" min="1" disabled>
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-success btn-number" onclick="window.location.href='/kafe/tambah/{{$kafes->id_keranjangkafe}}'">
                                                                            <span>+</span>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>@currency($kafes->total)</td>
                                                        <td><a href="#" class="btn btn-danger btn-icon-split" onclick="window.location.href='/kafe/delete/{{$kafes->id_keranjangkafe}}'">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text">Hapus</span>
                                                            </a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <h5 class=" font-weight-bold">Total : @currency($totalpembayaran)</h5>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

        </div>
        <!-- /.container-fluid -->

    </div>

    @include('admin.footer')