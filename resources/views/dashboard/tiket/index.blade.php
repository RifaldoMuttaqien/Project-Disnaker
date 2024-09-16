@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tiket Pengaduan</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Ticket</th>
                <th>Body</th>
                <th>Lampiran</th>
                <th>Tgl Awal</th>
                <th>Kategori</th>
                <th>Pengadu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiketPengaduan as $tiket)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tiket->ticket }}</td>
                <td>{{ $tiket->body }}</td>
                <td>{{ $tiket->lampiran }}</td>
                <td>{{ $tiket->tgl_awal }}</td>
                <td>{{ $tiket->kategori_id }}</td> <!-- Modify if relationships are used -->
                <td>{{ $tiket->pengadu_id }}</td>   <!-- Modify if relationships are used -->
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $tiketPengaduan->links() }}
</div>
@endsection
