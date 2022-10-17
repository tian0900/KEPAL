@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
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
                                <a href={{url('/daftarcafe')}}>Daftar Kafe</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Ubah Kafe</a>
                            </li>
                        </ol>
                    </nav>
                <!-- Basic Card Example -->
                <div class="card shadow col-xl-8 col-md-6 mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ubah Daftar Kafe</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('daftarcafe.update',$editcafes->id_cafe)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="inputjenisservice" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id_cafe" value="{{$editcafes->id_cafe}}">
                                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$editcafes->nama}}">
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
                                    <input type="number" class="form-control @error('harga_cafe') is-invalid @enderror" id="harga_cafe" name="harga_cafe" value="{{$editcafes->harga_cafe}}">
                                    @error('harga_cafe')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="exampleFormControlSelect1" id="kategori" name="kategori" value="{{$editcafes->kategori}}">
                                        <option value="Makanan"{{$editcafes->kategori == "Makanan" ? 'selected' : ''}}>Makanan</option>
                                        <option value="Makanan Ringan"{{$editcafes->kategori == "Makanan Ringan" ? 'selected' : ''}}>Makanan Ringan</option>
                                        <option value="Minuman"{{$editcafes->kategori == "Minuman" ? 'selected' : ''}}>Minuman</option>
                                        <option value="Aneka Jus"{{$editcafes->kategori == "Aneka Jus" ? 'selected' : ''}}>Aneka Jus</option>
                                    </select>
                                    @error('kategori')
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