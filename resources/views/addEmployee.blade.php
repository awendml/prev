<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Add data</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="/prev/employee" class="btn btn-secondary">back</a>
                    <br/>
                    <br/>
                    <form method="POST" action="/prev/employee/store" enctype="multipart/form-data">

                                                @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Employee name ..">
 
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Number Employee</label>
                            <textarea name="numemp" class="form-control"  placeholder="Number employee ..">{{ old('numemp') }}</textarea>
 
                             @if($errors->has('numemp'))
                                <div class="text-danger">
                                    {{ $errors->first('numemp')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" id="address"  class="form-control">{{ old('address') }}</textarea>
 
                            @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Masukkan foto</label>
                            <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" placeholder="Masukkan foto">
 
                             @if($errors->has('foto'))
                                <div class="text-danger">
                                    {{ $errors->first('foto')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <select class="form-select" name="position_id" id="position_id"  aria-label="Default select example">
                                <option selected>{{ null }}</option>
                                @foreach ($position as $e)     
                                 <option value="{{ $e->id }}">{{ $e->position }}</option>
                                @endforeach
                              </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Save">
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