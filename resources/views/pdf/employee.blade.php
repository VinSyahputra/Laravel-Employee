<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EXPORT EMPLOYEE</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
  </head>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header d-flex align-items-center"><h3>{{ __('Data Employee') }}</h3></div>
                    <div class="card-body py-2">
                      @foreach ($data->chunk(10) as $employees)
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @foreach ($employees as $row)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->company->name }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
