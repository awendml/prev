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
                            <div class="right float-right mr-3">
                                <a href="/prev/employee/add" class="btn btn-sm btn-secondary">Tambahkan data</a>
                                <a href="/prev/employee/trash" class="btn btn-sm btn-secondary">Sampah</a>
                                <a href="/prev/employee/export" class="btn btn-sm btn-secondary" target="_blank">Ekspor excel</a>
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#importExcel">
                                    Import excel
                                </button>
                                <a href="/prev/employee/prereport" class="btn btn-sm btn-secondary" target="_blank">Cetak PDF</a>

                            </div>
                     
                            <!-- Import Excel -->
                            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="/prev/employee/import" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                            </div>
                                            <div class="modal-body">
                     
                                                {{ csrf_field() }}
                     
                                                <label>Pilih file excel</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" required="required">
                                                </div>
                     
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                     

    
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
