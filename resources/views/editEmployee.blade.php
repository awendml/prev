<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="/prev/employee" class="btn btn-primary">Back</a>
                    <br/>
                    <br/>
                    <form method="post" action="/prev/employee/update/{{ $employee->id }}" enctype="multipart/form-data">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
 
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Employee name .." value="{{ $employee->name }}">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" id="address" class="form-control">{{ $employee->address }}</textarea>
 
                            @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Number employee</label>
                            <textarea name="numemp" class="form-control" placeholder="Number employee .."> {{ $employee->numemp }} </textarea>
 
                             @if($errors->has('numemp'))
                                <div class="text-danger">
                                    {{ $errors->first('numemp')}}
                                </div>
                            @endif
 
                        </div>


                        <div class="form-group">
                            <label>Masukkan foto</label>
                            <input type="file" name="foto" class="form-control" placeholder="Masukkan foto" value="{{ $employee->foto }}">
                            {{ $employee->foto }}
                            
                             @if($errors->has('foto'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('foto')}}</strong>  
                                </span>
                            @endif
 
                        </div>

                        <div class="form-group">
                                
                            <div class="form-group">
                                <select class="form-select" name="position_id" id="position_id" aria-label="Default select example">
                                    <option value="{{ $employee->position->id }}" selected>{{ $employee->position->position }}</option>
                                    @foreach ($position as $e)     
                                     <option value="{{ $e->id }}">{{ $e->position }}</option>
                                    @endforeach
                                  </select>
                            </div>
                             @if($errors->has('position_id'))
                                <div class="text-danger">
                                    {{ $errors->first('position_id')}}
                                </div>
                            @endif
                                
 
                        </div>
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#address' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        
    </body>
</html>
