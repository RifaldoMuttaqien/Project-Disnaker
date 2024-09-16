@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Tiket Pengaduan Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tiketpengaduantampil.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body" required>{{ old('body') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="lampiran" class="form-label">Lampiran (Optional)</label>
            <input type="text" class="form-control" id="lampiran" name="lampiran" value="{{ old('lampiran') }}">
        </div>

        <div class="mb-3">
            <label for="tgl_awal" class="form-label">Tanggal Awal</label>
            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="{{ old('tgl_awal') }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <!-- Populate Kategori options here -->
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pengadu_id" class="form-label">Pengadu</label>
            <select class="form-control" id="pengadu_id" name="pengadu_id" required>
                <!-- Populate Pengadu options here -->
                <option value="">Pilih Pengadu</option>
                @foreach($pengadu as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Tiket</button>
    </form>
</div>
@endsection
