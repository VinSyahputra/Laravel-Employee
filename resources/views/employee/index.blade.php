@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/home" class="btn btn-secondary">back to home</a>
            <div class="card mt-4">
                <div class="card-header d-flex align-items-center"><h3>{{ __('Employees') }}</h3>
                    <a href="/employees/create" class="text-decoration-none btn btn-primary ms-auto">NEW</a>
                </div>
                <div class="card-body py-2">
                  <form action="/employees/import" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3 my-3">
                      <input type="file" name="file" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Import Data</button>
                </form>
    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($employees as $employee)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>
                                <a href="/employees/{{ $employee->id }}/edit" class="btn btn-warning">EDIT</a>
                                <form action="/employees/{{ $employee->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Delete employee data ?');" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $employees->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection