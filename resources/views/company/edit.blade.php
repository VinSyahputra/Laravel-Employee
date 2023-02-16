@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <a href="/companies" class="btn btn-secondary">back to companies</a>
                <div class="card mt-4">
                    <div class="card-header d-flex align-items-center"><h3>{{__('Edit Company') }}</h3></div>
                    <form action="/companies/{{ $company->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Company Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="company name" value="{{ old('name', $company->name) }}" name="name">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="company@example.com" value="{{ old('email', $company->email) }}" name="email">
                                @error('email')
                                {{ $message }}
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Company logo</label>
                                <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" value="{{ $company->logo }}" name="logo">
                                <img class="img-preview img-fluid col-sm-6 my-3" >
                                @error('logo')
                                {{ $message }}
                            @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection