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
                        <a href={{url('/daftargaleri')}}>Daftar Galeri</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a>Ubah Galeri</a>
                    </li>
                </ol>
            </nav>

            <!-- Page Heading -->
            <main>
                <div class="container-fluid">

                    <!-- Basic Card Example -->
                    <div class="card shadow col-xl-10 col-md-6 mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Daftar Galeri</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('daftargaleri.update',$editgaleris->id_galeri)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputjudul" class="col-sm-2 col-form-label">judul</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_galeri" value="{{$editgaleris->id_galeri}}">
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{$editgaleris->judul}}" autofocus>
                                        @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargatipea" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <img src="{{url('gbr_galeri/'.$editgaleris->gambar)}}" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="" onchange="previewImage()">
                                    </div>
                                    @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group row py-xl-5">
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