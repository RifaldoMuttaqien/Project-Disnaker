<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No Handphone</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Pesan</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col" style="width: 18%">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse  ($dataPengaduan as $dataPengaduans)
                                        <tr>
                                           
                                            <td>{{ $dataPengaduans->no_handphone}}</td>
                                            <td>{{ $dataPengaduans->nama}}</td>
                                            <td>{{ $dataPengaduans->foto}}</td>
                                            <td>{{ $dataPengaduans->tgl}}</td>
                                            <td>{{ $dataPengaduans->body}}</td>
                                            <td>{{ $dataPengaduans->kategori->nama}}</td>
                                            
                                            <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datapengaduan.destroy', $dataPengaduans->id)}}" method="POST">
                                            



                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                            </form>
                                        </td>
                                        </tr>
                                        @empty
                                    <div class="alert alert-danger">
                                        Data Proses Pengaduan belum Tersedia.
                                    </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                