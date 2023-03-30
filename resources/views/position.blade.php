@include('layout.header')
@include('layout.sidebar')


<body>
    <div class="content-wrapper p-3">
        <h3 class="content-header">Employee Data </h3>
        <a href="/prev/position/add" class="btn btn-primary mb-3">Add</a>
        <table class="table table-hover table-bordered p-5">
            <tr>
                <th>id</th>
                <th>Position</th>
                <th>Option</th>
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
                    <a class="btn btn-info" href="/prev/position/edit/{{ encrypt($p->id) }}">Edit</a>
                    <a class="btn btn-dark" href="/prev/position/delete/{{ $p->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
@include('layout.footer')