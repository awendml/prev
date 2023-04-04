@include('layout.header')
@include('layout.sidebar')  
<body>
        <div class="content-wrapper">
        <h3 class="content-header"><h3>{{ $title }}</h3>
        <div class="container"> 
            <div class="card">
                <div class="card-body">
                    
                    <div>
                        <table class="table table-striped" >
                            
                            <form action="/prev/employee/" method="GET">
                                <input type="text" name="cari" placeholder="Cari pegawai">
                                <input type="submit" value="cari" class="btn-secondary lg ">
                            </form>
    
                            <a href="/prev/employee/add" class="btn btn-sm btn-secondary float-right mr-3">Tambahkan data</a>
                            <a href="/prev/employee/trash" class="btn btn-sm btn-secondary float-right mr-3">Sampah</a>
    
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Alamat</th>
                                    <th>Nomor Pegawai</th>
                                    <th>Jabatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee as $e)
                                    <tr>
                                        <td>{{$e->id}}</td>
                                        <td>{{$e->name}}</td>
                                        <td>
                                            <img src="{{ asset('images/'.$e->foto) }}" alt="Gambar" width="50px">
                                        </td>
                                        <td>{!! $e->alamat !!}</td>
                                        <td>{{$e->numemp}}</td>
                                        <td>{{$e->position->position}}</td>
    
                                        <td>
                                            <a href="/prev/employee/edit/{{ encrypt($e->id) }}" class="btn btn-secondary">Ubah</a>
                                            <a href="/prev/employee/delete/{{ $e->id }}" class="btn btn-dark">Hapus</a>
                                        </td>
                                    </tr>
    
                                @endforeach
    
                            </tbody>
                            
                        </table>
                        @if (Request::get('search')!=null)
                            <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm mb-3">Kembali</a>
                        @endif
                        {{ $employee->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@include('layout.footer')
