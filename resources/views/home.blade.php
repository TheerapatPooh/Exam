<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .debug{
            border: red 1px solid;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>School List</h1>
        <table class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                <tr>
                    <td>{{$school->id}}</td>
                    <td>{{$school->name}}</td>
                    <td>{{$school->address}}</td>
                    <td>
                        <form action="{{ route('schools.destroy',$school->id)}}" method="POST">
                            <a href="{{ route('schools.edit',$school->id)}}" class="btn btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <a href="{{ route('schools.create') }}" class="btn btn-primary">Add School</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
