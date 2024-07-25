<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trashed Classes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Trashed Classes</h2>
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th scope="col">Class Name</th>
              <th scope="col">capacity</th>
              <th scope="col">price</th>
              <th scope="col">From</th>
              <th scope="col">To</th>
              <th scope="col">Is fulled</th>
              <th scope="col">Deleted</th>
            </tr>
          </thead>
          <tbody>
            @foreach($classes as $classe)
            <tr>
              <td scope="row"><a href="{{route('classes.details', $classe['id'])}}">{{$classe['classname']}}</a></td>
              <td>{{$classe['capacity']}}</td>
              <td>{{$classe['price']}}</td>
              <td>{{$classe['timefrom']}}</td>
              <td>{{$classe['timeto']}}</td>
              <td>{{$classe['isfulled']}}</td>
              {{-- <td><a href={{route('classes.edit', $classe['id'])}}>Edit</a></td> --}}
              <td><a href="">Delete</a></td>
              {{-- <td><form action="{{route('classes.destroy', $classe->id)}}" method="POST">  
                @csrf   
                @method('DELETE')  
                <input type="hidden" name="id" value="{{$classe->id}}"> --}}
              </form>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>