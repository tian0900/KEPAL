@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href={{url('/dashboard')}}>Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href={{url('/daftarlayanan')}}>Daftar Layanan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a>Ubah Layanan</a>
                    </li>
                </ol>
            </nav>
            <!-- Page Heading -->
            <main>
                <div class="container-fluid">

                    <!-- Basic Card Example -->
                    <div class="card shadow col-xl-10 col-md-6 mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Daftar Layanan</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('daftarlayanan.update',$editlayanans->id_layanan)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputjenisservice" class="col-sm-2 col-form-label">Jenis Service</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_produk" value="{{$editlayanans->id_layanan}}">
                                        <input type="text" class="form-control  @error('jenisservice') is-invalid @enderror" id="jenisservice" name="jenisservice" value="{{$editlayanans->jenisservice}}">
                                        @error('jenisservice')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipea" class="col-sm-2 col-form-label">Harga Tipe A</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  @error('harga_tipea') is-invalid @enderror" id="harga_tipea" name="harga_tipea" value="{{$editlayanans->harga_tipea}}">
                                        @error('harga_tipea')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipeb" class="col-sm-2 col-form-label">Harga Tipe B</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control  @error('harga_tipeb') is-invalid @enderror" id="harga_tipeb" name="harga_tipeb" value="{{$editlayanans->harga_tipeb}}">
                                        @error('harga_tipeb')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <img src="{{url('gbr_layanan/'.$editlayanans->gambar_layanan)}}" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                        <input type="file" class="form-control  @error('gambar_layanan') is-invalid @enderror" id="gambar" name="gambar_layanan" onchange="previewImage()">
                                        @error('gambar_layanan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
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