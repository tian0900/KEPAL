@include('sweetalert::alert')
@include('admin.sidebar')
<!-- Content Wrapper -->
@include('sweetalert::alert')
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
                                <a href={{url('/daftarproduk')}}>Daftar Produk</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Tambah Produk</a>
                            </li>
                        </ol>
                    </nav>
                    <!-- Basic Card Example -->
                    <div class="card shadow col-xl-10 col-md-6 mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Daftar Produk</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('daftarproduk.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Produk" autofocus value="{{ old('nama') }}">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipea" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="cth: 150000" autofocus value="{{ old('harga') }}">
                                        @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipea" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" placeholder="Kategori Produk" autofocus value="{{ old('kategori') }}"> -->
                                        <select class="form-select form-control @error('kategori') is-invalid @enderror" aria-label="Default select example" id="kategori" name="kategori" autofocus>
                                            <option value="">Pilih Kategori</option>
                                            <option value="Sparepart">Sparepart</option>
                                            <option value="Eksterior">Eksterior</option>
                                            <option value="Interior">Interior</option>
                                            <option value="Filter">Filter</option>
                                        </select>
                                        @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipea" class="col-sm-2 col-form-label">Stok</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Jumlah Stok" autofocus value="{{ old('stok') }}">
                                        @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipea" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                        <input class="form-control @error('gambar_produk') is-invalid @enderror" type="file" id="gambar" name="gambar_produk" onchange="previewImage()" autofocus value="{{ old('gambar_produk') }}">
                                        @error('gambar_produk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
    <!-- End of Main Content -->
    @include('admin.footer')