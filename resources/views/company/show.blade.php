@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/companies" class="btn btn-secondary">back to companies</a>
            <div class="card mt-4">
                <div class="card-header d-flex align-items-center"><h3>{{$company->name . __(' Employees') }}</h3></div>
                <div class="card-body py-2">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($employees as $employee)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                <a href="/companies/{{ $employee->id }}/edit" class="btn btn-warning">EDIT</a>
                                <a href="" class="btn btn-danger">DELETE</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection