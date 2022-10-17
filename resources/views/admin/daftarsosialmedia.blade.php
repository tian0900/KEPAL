@include('admin.sidebar')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Sosial Media</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{url('/dashboard')}}>Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Daftar Sosial Media</a>
                            </li>
                        </ol>
                    </nav>
                    
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
                    <div class="col-md-8">
                        @foreach($sosials as $sosial)
                        <form action="{{route('daftarsosialmedia.update',$sosial->id_sosialmedia)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"> <label for="exampleFormControlInput1">{{$sosial->judul}}</label></div>
                                    <div class="col-md-8"> 
                                        <input type="text" class="form-control  @error('hyperlink') is-invalid @enderror" name="hyperlink" id="exampleFormControlInput1" value="{{$sosial->hyperlink}}">
                                        @error('hyperlink')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                    <div class="col-md-2"> <button type="submit" class="btn btn-success btn-icon-split">
                                            <a href="" class="btn btn-success btn-icon-split" style="text-align: right;">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Simpan</span>
                                            </a>
                                        </button> </div>
                                </div>
                            </div>

                        </form>
                        @endforeach
                    </div>
                </div>
            </main>

        </div>
        <!-- /.container-fluid -->

    </div>
    @include('admin.footer')