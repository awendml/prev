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
                    <a href="/prev/position" class="btn btn-secondary">back</a>
                    <br/>
                    <br/>
                    <form method="POST" action="/prev/position/store">

                                                    @csrf
     
                            <div class="form-group">
                                <label>Position</label>
                                <input name="position" class="form-control" placeholder="Input position">
     
                                 @if($errors->has('position'))
                                    <div class="text-danger">
                                        {{ $errors->first('position')}}
                                    </div>
                                @endif
     
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Save">
                            </div>
     
                        </form>
 
                </div>
            </div>
        </div>
    </body>
</html>