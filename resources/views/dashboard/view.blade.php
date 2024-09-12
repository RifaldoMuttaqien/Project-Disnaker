@extends('layouts.app')

@section('content')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="container px-5 justify-content-center mt-4 mb-5 border-line">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgSvNs-twGNEoR_T0o2IvHGuLxV8hE9ijN84SE7lUe-AoBsgEXHU0KWVoMv0shi5rGLZNCmyD9Wvq5Z9AIirGqrHVHt-DKCU9s4O7evIplKcUuOSN4z6e0btsxDAAI6lUe14t6UJ3SUqhM/s16000/Pengaduan+Online.png" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-1 py-5">
                    <form action="{{ route('pengadutampil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row px-3">
                            <label class="col-form-label text-sm">NIK</label>
                            <input class="form-control " type="number" name="nik" placeholder="Masukkan NIK Anda">
                        </div>
                        <div class="form-group row px-3 ">
                            <label class="col-form-label text-sm">Nama</label>
                            <input class="form-control" type="text" name="name" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="form-group row px-3 ">
                            <label class="col-form-label text-sm">No WhatsApp</label>
                            <input class="form-control" type="number" name="no_wa" placeholder="Masukkan nomor Handphone Anda">
                        </div>
                        <div class="form-group row mt-5">
                            <button type="submit" class="btn btn-primary text-center">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3">
                <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2024. All rights reserved.</small>
            </div>
        </div>
    </div>
</div>
@endsection

