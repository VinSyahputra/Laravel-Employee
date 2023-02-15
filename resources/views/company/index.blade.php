@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="/home" class="btn btn-secondary">back to home</a>
            <div class="card mt-4">
                <div class="card-header d-flex align-items-center"><h3>{{ __('Companies') }}</h3>
                    <a href="/companies/create" class="text-decoration-none btn btn-primary ms-auto">NEW</a>
                </div>
                <div class="card-body py-2">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($companies as $company)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                @if ($company->logo)
                                <img src="{{ asset('storage/'.$company->logo) }}" alt="" width="60">
                                @else
                                <img src="img/logo-default.png" alt="" width="60">
                                @endif
                            </td>
                            <td>
                                <a href="/companies/{{ $company->id }}" class="btn btn-success">SHOW</a>
                                <a href="/companies/{{ $company->id }}/edit" class="btn btn-warning">EDIT</a>
                                <form action="/companies/{{ $company->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Delete company data ?');" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{ $companies->links() }}
@endsection