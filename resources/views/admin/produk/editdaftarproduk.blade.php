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
                                <a href={{url('/daftarproduk')}}>Daftar Produk</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Ubah Produk</a>
                            </li>
                        </ol>
                    </nav>
                    <!-- Basic Card Example -->
                    <div class="card shadow col-xl-10 col-md-6 mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Daftar produk</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('daftarproduk.update',$editproduks->id_produk)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_produk" value="{{$editproduks->id_produk}}">
                                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$editproduks->nama}}">
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
                                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{$editproduks->harga}}">
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
                                        <select class="form-select form-control @error('kategori') is-invalid @enderror" aria-label="Default select example" id="kategori" name="kategori" autofocus>
                                            <option value="Sparepart"{{$editproduks->kategori == "Sparepart" ? 'selected' : ''}}>Sparepart</option>
                                            <option value="Eksterior"{{$editproduks->kategori == "Eksterior" ? 'selected' : ''}}>Eksterior</option>
                                            <option value="Interior"{{$editproduks->kategori == "Interior" ? 'selected' : ''}}>Interior</option>
                                            <option value="Filter" {{$editproduks->kategori == "Filter" ? 'selected' : ''}}>Filter</option>
                                        </select>
                                        @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipea" class="col-sm-2 col-form-label">Kuantitas</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control  @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{$editproduks->stok}}">
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
                                        <img src="{{url('gbr_produk/'.$editproduks->gambar)}}" class="img-preview mb-3 col-sm-5" alt="">
                                            <input type="file" class="form-control  @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{url('gbr_produk/'.$editproduks->gambar)}}" onchange="previewImage()">
                                            @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{$editproduks->deskripsi}}</textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success">Ubah</button>
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