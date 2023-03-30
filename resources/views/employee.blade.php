@include('layout.header')
@include('layout.sidebar')
<body>
        <div class="content-wrapper">
        <h3 class="content-header">Employee Data </h3>
        <div class="container">
            <div class="text-center">
                <a href="/prev/home" class="btn btn-md btn-secondary mb-3 text-center">Dashboard</a>
            </div>
            <div class="card">
                <div class="card-body">
                    
                    <div>
                        <table class="table table-striped" >
                            
                            <form action="/prev/employee/" method="GET">
                                <input type="text" name="search" placeholder="Find employees">
                                <input type="submit" value="search" class="btn-secondary lg ">
                            </form>
    
                            <a href="/prev/employee/add" class="btn btn-sm btn-secondary float-right mr-3">Add data</a>
                            <a href="/prev/employee/trash" class="btn btn-sm btn-secondary float-right mr-3">Trash</a>
    
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Number Employee</th>
                                    <th>Position</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($employee as $e)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$e->name}}</td>
                                        <td>{!! $e->alamat !!}</td>
                                        <td>{{$e->numemp}}</td>
                                        <td>{{$e->position->position}}</td>
    
                                        <td>
                                            <a href="/prev/employee/edit/{{ encrypt($e->id) }}" class="btn btn-secondary">Edit</a>
                                            <a href="/prev/employee/delete/{{ $e->id }}" class="btn btn-dark">Delete</a>
                                        </td>
                                    </tr>
    
                                @endforeach
    
                            </tbody>
                            
                        </table>
                        @if (Request::get('search')!=null)
                        <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm mb-3">Back</a>
                    @endif
                        {{ $employee->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@include('layout.footer')
