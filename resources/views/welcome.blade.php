<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row justify-content-center">
    <div class="col-sm-6">
        <form action="{{ route('upload_zip') }}" class="form-inline" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Zip File</label>
                <input type="file" class="form-control" name="zip_file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>

</html>
