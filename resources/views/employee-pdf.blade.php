<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Download PDF</title>
</head>
<body>
    <a class="btn btn-secondary btn-lg m-3" href="/prev/employee/report" target="_blank">Cetak PDF</a>
        <div class="content-wrapper">

        <div class="container"> 
            <div class="card">
                <div class="card-body">
                    
                    <div>
                        <table class="table table-striped" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Alamat</th>
                                    <th>Nomor Pegawai</th>
                                    <th>Jabatan</th>
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
                                    </tr>
                                @endforeach
    
                            </tbody>
                            
                        </table>
                        @if (Request::get('search')!=null)
                            button href="{{ url()->previous() }}" class="btn btn-dark btn-sm mb-3">Kembali</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

