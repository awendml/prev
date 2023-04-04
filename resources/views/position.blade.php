@include('layout.header')
@include('layout.sidebar')


<body>
    <div class="content-wrapper p-3">
        <h3 class="content-header"><h3>{{ $title }}</h3>
        <a href="/prev/position/add" class="btn btn-primary mb-3">Tambahkan</a>
        <table class="table table-hover table-bordered p-5">
            <tr>
                <th>id</th>
                <th>Jabatan</th>
                <th>Opsi</th>
            </tr>

            @php
                $i=1;
            @endphp
            @foreach ($position as $p)
            <tr>
                <td>
                    {{ $i++ }}
                </td>
                <td>{{ $p->position }}</td>
                <td>
                    <a class="btn btn-info" href="/prev/position/edit/{{ encrypt($p->id) }}">Ubah</a>
                    <a class="btn btn-dark" href="/prev/position/delete/{{ $p->id }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
@include('layout.footer')