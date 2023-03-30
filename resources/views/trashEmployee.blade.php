<!DOCTYPE html>
<html>
<head>
	<title>Trash</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
 
	<div class="container">
 
		<div class="card mt-5">
			<div class="card-header text-center">
			</div>
			<div class="card-body">
 
				<a href="/prev/employee">back</a>
				|
				<a href="/prev/employee/trash" class="btn btn-sm btn-primary">Trash</a>
 
				<br/>
				<br/>
 
				<a href="/prev/employee/restore_all">Restore all</a>
				|
				<a href="/prev/ ">Delete permanent all</a>
				<br/>
				<br/>
 
				<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Number Employee</th>
                            <th>Position</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trash as $e)
                            <tr>
                                <td>{{$e->id}}</td>
                                <td>{{$e->name}}</td>
                                <td>{{$e->numemp}}</td>
                                <td>{{$e->position->position}}</td>

                                <td>
                                    <a href="/prev/employee/delete_permanent/{{ $e->id }}" class="btn btn-dark">Delete permanent</a>
                                    <a href="/prev/employee/restore/{{ $e->id }}" class="btn btn-dark">Restore</a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>